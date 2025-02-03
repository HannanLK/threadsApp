<x-app-layout>
    <div class="font-[sans-serif] bg-gradient-to-br from-blue-50 to-purple-50 py-12">
        <div class="w-full max-w-4xl mx-auto p-6 bg-white rounded-lg shadow-lg">
            <div class="text-center mb-8">
                <h2 class="text-3xl font-bold text-gray-800">Checkout</h2>
                <p class="text-gray-600 mt-2">Complete your purchase securely</p>
            </div>

            <!-- Success/Error Messages -->
            @if (session('success'))
                <div class="p-4 mb-6 text-green-800 bg-green-100 rounded-lg">{{ session('success') }}</div>
            @endif
            @if ($errors->any())
                <div class="p-4 mb-6 text-red-800 bg-red-100 rounded-lg">{{ $errors->first() }}</div>
            @endif

            <form action="{{ route('process.payment') }}" method="POST" id="payment-form" class="space-y-8">
                @csrf

                <!-- Shipping Information -->
                <div class="space-y-6">
                    <h3 class="text-xl font-semibold text-gray-800">Shipping Information</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700">Full Name</label>
                            <input type="text" id="name" name="name" required class="w-full px-4 py-2 mt-1 text-sm text-gray-800 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <input type="email" id="email" name="email" required class="w-full px-4 py-2 mt-1 text-sm text-gray-800 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        <div>
                            <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                            <input type="text" id="address" name="address" required class="w-full px-4 py-2 mt-1 text-sm text-gray-800 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        <div>
                            <label for="city" class="block text-sm font-medium text-gray-700">City</label>
                            <input type="text" id="city" name="city" required class="w-full px-4 py-2 mt-1 text-sm text-gray-800 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        <div>
                            <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
                            <input type="text" id="phone" name="phone" required class="w-full px-4 py-2 mt-1 text-sm text-gray-800 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        <div>
                            <label for="postal_code" class="block text-sm font-medium text-gray-700">Postal Code</label>
                            <input type="text" id="postal_code" name="postal_code" required class="w-full px-4 py-2 mt-1 text-sm text-gray-800 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        </div>
                    </div>
                </div>

                <!-- Payment Method -->
                <div class="space-y-6">
                    <h3 class="text-xl font-semibold text-gray-800">Payment Method</h3>
                    <div class="space-y-4">
                        <div class="flex items-center p-4 border border-gray-300 rounded-lg hover:border-blue-500 transition-all">
                            <input type="radio" id="credit-card" name="payment" class="w-5 h-5 cursor-pointer" checked />
                            <label for="credit-card" class="ml-4 cursor-pointer flex items-center gap-4">
                                <img src="https://readymadeui.com/images/visa.webp" class="w-8" alt="Visa" />
                                <img src="https://readymadeui.com/images/master.webp" class="w-8" alt="Mastercard" />
                                <img src="https://readymadeui.com/images/american-express.webp" class="w-8" alt="Amex" />
                            </label>
                        </div>
                    </div>

                    <!-- Credit Card Details -->
                    <div id="credit-card-info" class="space-y-6">
                        <div>
                            <label for="cardholder-name" class="block text-sm font-medium text-gray-700">Cardholder Name</label>
                            <input type="text" id="cardholder-name" placeholder="John Doe" class="w-full px-4 py-2 mt-1 text-sm text-gray-800 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        <div>
                            <label for="card-number" class="block text-sm font-medium text-gray-700">Card Number</label>
                            <div id="card-number" class="w-full px-4 py-2 mt-1 text-sm text-gray-800 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"></div>
                        </div>
                        <div class="grid grid-cols-2 gap-6">
                            <div>
                                <label for="card-expiry" class="block text-sm font-medium text-gray-700">Expiry Date</label>
                                <div id="card-expiry" class="w-full px-4 py-2 mt-1 text-sm text-gray-800 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"></div>
                            </div>
                            <div>
                                <label for="card-cvc" class="block text-sm font-medium text-gray-700">CVC</label>
                                <div id="card-cvc" class="w-full px-4 py-2 mt-1 text-sm text-gray-800 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Terms and Conditions -->
                <div class="flex items-center">
                    <input id="terms" type="checkbox" class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500" required />
                    <label for="terms" class="ml-3 text-sm text-gray-700">
                        I agree to the <a href="#" class="font-semibold text-blue-600 hover:underline">Terms and Conditions</a>.
                    </label>
                </div>

                <!-- Submit Buttons -->
                <div class="flex justify-between items-center mt-8">
                    <button type="button" class="px-6 py-3 text-sm font-medium text-gray-800 bg-gray-100 rounded-lg hover:bg-gray-200 transition-all">Back</button>
                    <button type="submit" class="px-6 py-3 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 transition-all">Pay Rs.{{ number_format($finalTotal, 2) }}</button>
                </div>
            </form>
        </div>

        <!-- Order Summary -->
        <div class="w-full max-w-4xl mx-auto mt-8 p-6 bg-white rounded-lg shadow-lg">
            <h3 class="text-xl font-semibold text-gray-800 mb-6">Order Summary</h3>
            <div class="space-y-6">
                @foreach($cartItems as $cartItem)
                    <div class="flex items-center gap-4">
                        <img src="{{ asset('storage/' .$cartItem->product->images[0]) }}" class="w-16 h-16 rounded-lg object-cover" />
                        <div>
                            <h4 class="text-base font-semibold text-gray-800">{{ $cartItem->product->name }}</h4>
                            <p class="text-sm text-gray-600">Quantity: {{ $cartItem->quantity }}</p>
                            <p class="text-sm text-gray-600">Price: Rs.{{ number_format($cartItem->quantity * $cartItem->product->price, 2) }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="mt-8 pt-6 border-t border-gray-200">
                <div class="flex justify-between text-gray-800">
                    <p class="text-sm">Subtotal</p>
                    <p class="text-sm font-semibold">Rs.{{ number_format($productTotal, 2) }}</p>
                </div>
                <div class="flex justify-between text-gray-800 mt-2">
                    <p class="text-sm">Shipping</p>
                    <p class="text-sm font-semibold">Rs.{{ number_format($shippingPrice, 2) }}</p>
                </div>
                <div class="flex justify-between text-gray-800 mt-4">
                    <p class="text-lg font-bold">Total</p>
                    <p class="text-lg font-bold">Rs.{{ number_format($finalTotal, 2) }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Stripe Script -->
    <script>
        var stripe = Stripe('{{ env('STRIPE_KEY') }}');
        var elements = stripe.elements();
        var style = {
            base: {
                color: '#32325d',
                fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                fontSmoothing: 'antialiased',
                fontSize: '16px',
                '::placeholder': {
                    color: '#aab7c4'
                }
            },
            invalid: {
                color: '#fa755a',
                iconColor: '#fa755a'
            }
        };

        var cardNumber = elements.create('cardNumber', {style: style});
        cardNumber.mount('#card-number');

        var cardExpiry = elements.create('cardExpiry', {style: style});
        cardExpiry.mount('#card-expiry');

        var cardCvc = elements.create('cardCvc', {style: style});
        cardCvc.mount('#card-cvc');

        cardNumber.addEventListener('change', function(event) {
            var displayError = document.getElementById('card-errors');
            if (event.error) {
                displayError.textContent = event.error.message;
            } else {
                displayError.textContent = '';
            }
        });

        var form = document.getElementById('payment-form');
        form.addEventListener('submit', function(event) {
            event.preventDefault();
            stripe.createToken(cardNumber).then(function(result) {
                if (result.error) {
                    var errorElement = document.getElementById('card-errors');
                    errorElement.textContent = result.error.message;
                } else {
                    stripeTokenHandler(result.token);
                }
            });
        });

        function stripeTokenHandler(token) {
            var form = document.getElementById('payment-form');
            var hiddenInput = document.createElement('input');
            hiddenInput.setAttribute('type', 'hidden');
            hiddenInput.setAttribute('name', 'stripeToken');
            hiddenInput.setAttribute('value', token.id);
            form.appendChild(hiddenInput);
            form.submit();
        }
    </script>
</x-app-layout>