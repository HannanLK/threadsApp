<!-- filepath: /Users/inazawaelectronics/Documents/Apiit/2years/Sem-2/mad/MadProject/resources/views/cart/index.blade.php -->
<x-app-layout>
    <section class="pt-20">
        <div class="max-w-screen-xl px-4 mx-auto">
            <h1 class="text-3xl font-semibold">Your Ca</h1>
            <div class="mt-6">
                @if($cartItems->isEmpty())
                    <p>Your cart is empty.</p>
                @else
                    <table class="w-full text-left">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">Product</th>
                                <th class="px-4 py-2">Size</th>
                                <th class="px-4 py-2">Color</th>
                                <th class="px-4 py-2">Quantity</th>
                                <th class="px-4 py-2">Price</th>
                                <th class="px-4 py-2">Total</th>
                                <th class="px-4 py-2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cartItems as $item)
                                <tr>
                                    <td class="px-4 py-2">{{ $item->product->name }}</td>
                                    <td class="px-4 py-2">{{ $item->size }}</td>
                                    <td class="px-4 py-2">{{ $item->color }}</td>
                                    <td class="px-4 py-2">{{ $item->quantity }}</td>
                                    <td class="px-4 py-2">Rs. {{ number_format($item->product->price) }}</td>
                                    <td class="px-4 py-2">Rs. {{ number_format($item->product->price * $item->quantity) }}</td>
                                    <td class="px-4 py-2">
                                        <form method="POST" action="{{ route('cart.remove', $item->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500">Remove</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mt-6 text-right">
                        <h2 class="text-2xl font-semibold">Total: Rs. {{ number_format($cartItems->sum(fn($item) => $item->product->price * $item->quantity)) }}</h2>
                    </div>
                @endif
            </div>
        </div>
    </section>
</x-app-layout>