<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Payment;
use App\Models\Order;
use App\Models\PaymentItem;
use Stripe\Stripe;
use Stripe\Charge;
use App\Mail\PaymentSuccess;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function add(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'size' => 'required|string',
            'color' => 'required|string',
        ]);

        if (Auth::check()) {
            // Authenticated user
            $cart = Cart::updateOrCreate(
                ['user_id' => Auth::id(), 'product_id' => $request->product_id],
                ['quantity' => $request->quantity, 'size' => $request->size, 'color' => $request->color]
            );
        } else {
            // Guest user
            $cart = session()->get('cart', []);
            $cart[$request->product_id] = [
                'product_id' => $request->product_id,
                'quantity' => $request->quantity,
                'size' => $request->size,
                'color' => $request->color,
            ];
            session()->put('cart', $cart);
        }

        return redirect()->route('product.details', ['id' => $request->product_id]);
    }

    public function index()
    {
        if (Auth::check()) {
            $cartItems = Cart::where('user_id', Auth::id())->with('product')->get();
            $cartItems = $cartItems->filter(function ($cartItem) {
                return $cartItem->product !== null;
            });
        } else {
            $cart = session()->get('cart', []);
            $cartItems = collect($cart)->map(function ($item) {
                $product = Product::find($item['product_id']);
                if ($product) {
                    return (object) [
                        'product' => $product,
                        'quantity' => $item['quantity'],
                        'size' => $item['size'],
                        'color' => $item['color'],
                    ];
                }
                return null;
            })->filter();
        }
    
        return view('product.cart', compact('cartItems'));
    }

    public function remove($id)
    {
        if (Auth::check()) {
            $cartItem = Cart::where('user_id', Auth::id())->where('id', $id)->firstOrFail();
            $cartItem->delete();
        } else {
            $cart = session()->get('cart', []);
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->route('product.cart');
    }

    public function checkout()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'You need to login to proceed to checkout.');
        }
    
        $cartItems = Cart::where('user_id', Auth::id())
                         ->with('product')
                         ->get()
                         ->filter(function ($cartItem) {
                             return $cartItem->product !== null;
                         });
    
        $productTotal = $cartItems->sum(function($cartItem) {
            return $cartItem->quantity * $cartItem->product->price;
        });
    
        $shippingPrice = 100.00;
        $finalTotal = $productTotal + $shippingPrice;
    
        return view('product.checkout', compact('cartItems', 'productTotal', 'shippingPrice', 'finalTotal'));
    }

    public function processPayment(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'You need to login to proceed to checkout.');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'postal_code' => 'required|string|max:10',
            'stripeToken' => 'required|string',
        ]);

        Stripe::setApiKey(env('STRIPE_SECRET'));

        try {
            $cartItems = Cart::where('user_id', Auth::id())->with('product')->get();
            $productTotal = $cartItems->sum(function ($cartItem) {
                return $cartItem->quantity * $cartItem->product->price;
            });

            $shippingPrice = 100.00; // Fixed shipping price
            $finalTotal = $productTotal + $shippingPrice;

            $charge = Charge::create([
                'amount' => $finalTotal * 100,
                'currency' => 'LKR',
                'source' => $request->stripeToken,
                'description' => 'Order Payment',
            ]);

            // Save the payment record
            $payment = new Payment();
            $payment->user_id = Auth::id();
            $payment->name = $request->name;
            $payment->email = $request->email;
            $payment->address = $request->address;
            $payment->city = $request->city;
            $payment->phone = $request->phone;
            $payment->postal_code = $request->postal_code;
            $payment->payment_method = 'stripe';
            $payment->payment_status = 'completed';
            $payment->total_amount = $finalTotal; // Save the final total in the payment record
            $payment->save();

            // Save each cart item as a payment item
            foreach ($cartItems as $cartItem) {
                PaymentItem::create([
                    'payment_id' => $payment->id,
                    'product_id' => $cartItem->product_id,
                    'quantity' => $cartItem->quantity,
                    'price' => $cartItem->product->price,
                ]);
            }

            // Save the order
            $order = new Order();
            $order->user_id = Auth::id();
            $order->payment_id = $payment->id;
            $order->total_amount = $finalTotal;
            $order->status = 'processing';
            $order->save();

            // Clear the user's cart
            Cart::where('user_id', Auth::id())->delete();

            // Send payment success email
            Mail::to($payment->email)->send(new PaymentSuccess($payment, $finalTotal));

            return redirect()->route('order.confirmation', ['payment' => $payment->id, 'finalTotal' => $finalTotal]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error! ' . $e->getMessage()], 500);
        }
    }

    public function orderConfirmation($paymentId, $finalTotal)
    {
        $payment = Payment::findOrFail($paymentId);
        return view('order_confirmation', compact('payment', 'finalTotal'));
    }

    public function updateQuantity(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:carts,id',
            'quantity' => 'required|integer|min:1'
        ]);
    
        $cartItem = Cart::find($request->product_id);
    
        if (!$cartItem) {
            return response()->json(['success' => false, 'message' => 'Cart item not found.']);
        }
    
        $product = Product::find($cartItem->product_id);
    
        if (!$product) {
            return response()->json(['success' => false, 'message' => 'Product not found.']);
        }
    
        // Check if requested quantity exceeds available stock
        if ($request->quantity > $product->stock) {
            return response()->json([
                'success' => false,
                'message' => "Only {$product->stock} items left in stock."
            ]);
        }
    
        // Update quantity in the cart
        $cartItem->quantity = $request->quantity;
        $cartItem->save();
    
        // Calculate the new total for the item
        $newTotal = $cartItem->quantity * $product->price;
    
        return response()->json([
            'success' => true,
            'newTotal' => $newTotal
        ]);
    }
}