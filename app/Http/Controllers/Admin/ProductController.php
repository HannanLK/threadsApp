<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.viewproduct', compact('products'));
    }
    
    public function create()
    {
        return view('admin.addproduct');
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required|string|max:255',
            'product_category' => 'required|string|max:255',
            'product_price' => 'required|numeric|min:1',
            'product_stock' => 'required|integer|min:1',
            'size' => 'required|array',
            'color' => 'required|array',
            'product_description' => 'required|string',
            'product_images' => 'required|array',
            'product_images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Save each image and store paths in the array
        $imagePaths = array_map(function ($image) {
            return $image->store('products', 'public');
        }, $request->file('product_images'));

        // Save the product with the image paths
        Product::create([
            'name' => $request->product_name,
            'category' => $request->product_category,
            'price' => $request->product_price,
            'stock' => $request->product_stock,
            'sizes' => $request->size,
            'colors' => $request->color,
            'description' => $request->product_description,
            'images' => $imagePaths,
        ]);

        return redirect()->route('admin.addproduct')->with('success', 'Product added successfully.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'product_name' => 'required|string|max:255',
            'product_category' => 'required|string|max:255',
            'product_price' => 'required|numeric|min:1',
            'product_stock' => 'required|integer|min:1',
            'size' => 'required|array',
            'color' => 'required|array',
            'product_description' => 'required|string',
            'product_images' => 'array|max:5',
            'product_images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $product = Product::findOrFail($id);

        if ($request->hasFile('product_images')) {
            $imagePaths = array_map(function ($image) {
                return $image->store('products', 'public');
            }, $request->file('product_images'));
            $product->images = $imagePaths;
        }

        $product->update([
            'name' => $request->product_name,
            'category' => $request->product_category,
            'price' => $request->product_price,
            'stock' => $request->product_stock,
            'sizes' => $request->size,
            'colors' => $request->color,
            'description' => $request->product_description,
        ]);

        return redirect()->route('admin.viewproduct')->with('success', 'Product updated successfully.');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('admin.viewproduct')->with('success', 'Product deleted successfully.');
    }

    public function showMenProducts()
    {
        $products = Product::where('category', 'Men')->get();
        return view('product.men', compact('products'));
    }

    public function showWomenProducts()
    {
        $products = Product::where('category', 'Women')->get();
        return view('product.women', compact('products'));
    }

    public function show($productId)
    {
        $product = Product::findOrFail($productId); 
        return view('product.details', compact('product'));
    }

    


}
