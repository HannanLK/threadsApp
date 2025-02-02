<x-app-layout>
    <div class="container mx-auto p-5 max-w-screen-lg">
        <h1 class="text-3xl font-bold mb-5">YOUR CART</h1>

        @if ($cartItems->isEmpty())
            <!-- Empty Cart Message -->
            <div class="flex flex-col items-center justify-center p-10 bg-white rounded-lg shadow-lg">
                <p class="mb-4 text-xl font-medium text-gray-600">Your cart is empty!</p>
                <a href="/" class="px-6 py-3 text-white bg-black rounded-lg hover:bg-gray-800">
                    Shop Now
                </a>
            </div>
        @else
            <!-- Cart Items Table -->
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-200">
                    <thead>
                        <tr>
                            <th class="bg-gray-100 text-gray-800 px-4 py-3 border w-1/2 sm:w-1/4">Product</th>
                            <th class="bg-gray-100 text-gray-800 px-4 py-3 border w-1/4">Price</th>
                            <th class="bg-gray-100 text-gray-800 px-4 py-3 border w-1/4">Quantity</th>
                            <th class="bg-gray-100 text-gray-800 px-4 py-3 border w-1/4">Total</th>
                        </tr>
                    </thead>
                    <tbody id="cartItems">
                        @foreach ($cartItems as $cartItem)
                            @php
                                $itemTotal = $cartItem->quantity * $cartItem->product->price;
                            @endphp
                            <tr data-product-id="{{ $cartItem->id }}">
                                <td class="border px-4 py-2">
                                    <div class="flex items-center gap-4">
                                        <img src="{{ asset('storage/' . $cartItem->product->images[0]) }}" 
                                             alt="{{ $cartItem->product->name }}" 
                                             class="w-20 h-20 object-cover ml-2">
                                        <div>
                                            <span class="font-semibold">{{ $cartItem->product->name }}</span><br>
                                            <p class="text-sm text-gray-500">Size: {{ $cartItem->size }} | Color: {{ $cartItem->color }}</p>
                                            <form action="{{ route('cart.remove', $cartItem->id) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:underline">Remove</button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                                <td class="border px-4 py-2 text-center">Rs. {{ number_format($cartItem->product->price, 2) }}</td>

                                <!-- Quantity Column with + and - buttons -->
                                <td class="border px-4 py-2 flex items-center justify-center">
                                    <button class="bg-gray-100 px-3 py-1 decrement" data-id="{{ $cartItem->id }}">-</button>
                                    <input type="text" value="{{ $cartItem->quantity }}" readonly class="quantity w-12 text-center border rounded-md mx-2">
                                    <button class="bg-gray-100 px-3 py-1 increment" data-id="{{ $cartItem->id }}">+</button>
                                </td>

                                <td class="border px-4 py-2 text-center item-total">Rs. {{ number_format($itemTotal, 2) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Cart Summary -->
            <div class="mt-5 flex justify-end">
                <table class="border border-gray-400 w-full sm:w-1/2 max-w-xs bg-white">
                    <tbody>
                        <tr>
                            <td class="px-4 py-2 border text-left font-medium">Subtotal</td>
                            <td class="px-4 py-2 border text-right">Rs. <span id="subtotal">{{ number_format($cartItems->sum(fn($item) => $item->quantity * $item->product->price), 2) }}</span></td>
                        </tr>
                        <tr>
                            <td class="px-4 py-2 border text-left font-medium">Tax (10%)</td>
                            <td class="px-4 py-2 border text-right">Rs. <span id="tax">{{ number_format($cartItems->sum(fn($item) => $item->quantity * $item->product->price) * 0.1, 2) }}</span></td>
                        </tr>
                        <tr>
                            <td class="px-4 py-2 border text-left font-semibold">Total</td>
                            <td class="px-4 py-2 border text-right font-semibold">Rs. <span id="total">{{ number_format($cartItems->sum(fn($item) => $item->quantity * $item->product->price) * 1.1, 2) }}</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Proceed to Checkout Button -->
            <div class="flex justify-end px-2 mt-6">
                <a href="{{ route('product.checkout') }}" class="bg-black text-white px-5 py-2 rounded-md uppercase hover:bg-white hover:text-black hover:border hover:border-black">
                    Proceed to Checkout
                </a>
            </div>
        @endif
    </div>

    <!-- JavaScript for Quantity Updates and Recalculation -->
    <script>
        function recalculateTotals() {
            let subtotal = 0;
    
            document.querySelectorAll('#cartItems tr').forEach(row => {
                const price = parseFloat(row.querySelector('td:nth-child(2)').textContent.replace('Rs.', '').trim()); // Ensure it's a number
                const quantity = parseInt(row.querySelector('.quantity').value); // Convert to integer
                const itemTotal = price * quantity;
    
                row.querySelector('.item-total').textContent = `Rs. ${itemTotal.toFixed(2)}`;
                subtotal += itemTotal;
            });
    
            const tax = subtotal * 0.10;
            const total = subtotal + tax;
    
            document.getElementById('subtotal').textContent = subtotal.toFixed(2);
            document.getElementById('tax').textContent = tax.toFixed(2);
            document.getElementById('total').textContent = total.toFixed(2);
        }
    
        document.querySelectorAll('.increment').forEach(button => {
            button.addEventListener('click', function () {
                const row = this.closest('tr');
                const quantityInput = row.querySelector('.quantity');
                let quantity = parseInt(quantityInput.value);
                const productId = row.getAttribute('data-product-id');
    
                fetch('{{ route("cart.updateQuantity") }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ product_id: productId, quantity: quantity + 1 })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        quantityInput.value = quantity + 1;
                        row.querySelector('.item-total').textContent = `Rs. ${data.newTotal.toFixed(2)}`; // Ensure correct update
                        recalculateTotals();
                    } else {
                        alert(data.message);
                    }
                })
                .catch(error => console.error('Error:', error));
            });
        });
    
        document.querySelectorAll('.decrement').forEach(button => {
            button.addEventListener('click', function () {
                const row = this.closest('tr');
                const quantityInput = row.querySelector('.quantity');
                let quantity = parseInt(quantityInput.value);
                const productId = row.getAttribute('data-product-id');
    
                if (quantity > 1) {
                    fetch('{{ route("cart.updateQuantity") }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({ product_id: productId, quantity: quantity - 1 })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            quantityInput.value = quantity - 1;
                            row.querySelector('.item-total').textContent = `Rs. ${data.newTotal.toFixed(2)}`;
                            recalculateTotals();
                        }
                    })
                    .catch(error => console.error('Error:', error));
                }
            });
        });
    </script>        
</x-app-layout>