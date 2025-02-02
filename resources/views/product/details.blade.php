<x-app-layout>
    <section class="pl-2 pt-28">
        <button onclick="window.history.back()" class="flex items-center space-x-2 text-lg font-medium text-black">
            <i class="fa-solid fa-angle-left"></i>
            <span>Back</span>
        </button>
    </section>

    <section class="category">
        <div class="py-6 sm:py-6 lg:py-6">
            <div class="max-w-screen-xl px-4 mx-auto md:px-8">
                <div class="grid gap-8 md:grid-cols-2">
                    <!-- images - start -->
                    <div class="grid gap-4 lg:grid-cols-5">
                        <div class="flex order-last gap-4 lg:order-none lg:flex-col">
                            @foreach($product->images as $image)
                                <div class="overflow-hidden bg-gray-100 rounded-lg thumbnail">
                                    <img src="{{ asset('storage/' . $image) }}" alt="Thumbnail" class="object-cover object-center w-full h-full thumbnail">
                                </div>
                            @endforeach
                        </div>

                        <div class="relative overflow-hidden bg-gray-100 rounded-lg lg:col-span-4">
                            <img id="mainImage" src="{{ asset('storage/' . $product->images[0]) }}" loading="lazy" alt="Product Image" class="object-cover object-center w-full h-full" />
                        </div>
                    </div>

                    <!-- product details -->
                    <div class="md:py-8">
                        <div class="mb-2 md:mb-3">
                            <h1 class="mb-2 text-2xl font-semibold md:text-3xl">{{ $product->name }}</h1>
                            <p class="font-normal text-gray-600">SKU: {{ $product->id }}</p>
                            <p class="mt-4 mb-6 text-xl font-semibold md:text-2xl">Rs {{ number_format($product->price) }}</p>
                            <p>Product description</p>
                            <p class="text-gray-500">{{ $product->description }}</p>
                        </div>

                        <!-- Size selection -->
                        <div class="flex flex-col items-center pb-3 mb-4 md:flex-row">
                            <span class="mb-2 text-gray-700 md:mb-0">Size :</span>
                            <div id="size-options" class="flex ml-0 space-x-2 md:ml-4">
                                @foreach ($product->sizes as $size)
                                    <button class="px-4 py-2 font-semibold text-black border rounded-full size-option focus:outline-none" data-size="{{ $size }}">
                                        {{ $size }}
                                    </button>
                                @endforeach
                            </div>
                            <a href="#" class="mt-2 ml-0 text-blue-600 md:ml-4 md:mt-0">Size guide</a>
                        </div>

                        <!-- Color selection -->
                        <div class="flex flex-col items-center pb-3 mb-4 md:flex-row">
                            <span class="mb-2 text-gray-700 md:mb-0">Color :</span>
                            <div id="color-options" class="flex ml-0 space-x-2 md:ml-4">
                                @foreach ($product->colors as $color)
                                    <button class="w-8 h-8 rounded-full color-option focus:outline-none" style="background-color: {{ $color }};" data-color="{{ $color }}"></button>
                                @endforeach
                            </div>
                        </div>

                        <!-- Quantity selection -->
                        <div class="flex items-center mb-6">
                            <span class="text-gray-700">Quantity :</span>
                            <div class="flex items-center ml-4 space-x-2 border border-black rounded-md">
                                <button id="decrement" class="px-4 py-2 text-black focus:outline-none">-</button>
                                <span id="quantity" class="font-semibold text-black">1</span>
                                <input type="hidden" name="quantity" id="quantityInput" value="1">
                                <button id="increment" class="px-4 py-2 text-black focus:outline-none">+</button>
                            </div>
                        </div>

                        <!-- Out of stock message -->
                        <div id="outOfStockMessage" class="hidden text-red-500">Product is not available in the desired quantity. Available stock: <span id="availableStock"></span></div>

                        <!-- Buttons -->
                        <div class="flex flex-col space-y-2 md:flex-row md:space-y-0 md:space-x-4">
                            <form id="add-to-cart-form" method="POST" action="{{ route('cart.add') }}">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <input type="hidden" name="product_name" value="{{ $product->name }}">
                                <input type="hidden" name="product_price" value="{{ $product->price }}">
                                <input type="hidden" name="size" id="selectedSize" value="">
                                <input type="hidden" name="color" id="selectedColor" value="">
                                <input type="hidden" name="quantity" id="selectedQuantity" value="1">
                                
                                <button type="button" id="addToCartButton" class="flex items-center w-64 justify-center px-6 py-3 space-x-2 font-medium text-white bg-green-600 rounded focus:outline-none hover:bg-black">
                                    <i class="fa-solid fa-bag-shopping" style="color: #ffffff;"></i>
                                    <span>Add to cart</span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const decrementButton = document.getElementById('decrement');
            const incrementButton = document.getElementById('increment');
            const quantityElement = document.getElementById('quantity');
            const quantityInput = document.getElementById('quantityInput');
            const outOfStockMessage = document.getElementById('outOfStockMessage');
            const availableStockElement = document.getElementById('availableStock');
            const maxStock = {{ $product->stock }};
            const addToCartButton = document.getElementById('addToCartButton');
            const selectedSizeInput = document.getElementById('selectedSize');
            const selectedColorInput = document.getElementById('selectedColor');
            const selectedQuantityInput = document.getElementById('selectedQuantity');

            // Handle size selection
            document.querySelectorAll('.size-option').forEach(button => {
                button.addEventListener('click', function () {
                    selectedSizeInput.value = this.getAttribute('data-size');
                });
            });

            // Handle color selection
            document.querySelectorAll('.color-option').forEach(button => {
                button.addEventListener('click', function () {
                    selectedColorInput.value = this.getAttribute('data-color');
                });
            });

            decrementButton.addEventListener('click', function () {
                let quantity = parseInt(quantityElement.textContent);
                if (quantity > 1) {
                    quantity--;
                    quantityElement.textContent = quantity;
                    quantityInput.value = quantity;
                    selectedQuantityInput.value = quantity;
                    outOfStockMessage.classList.add('hidden');
                }
            });

            incrementButton.addEventListener('click', function () {
                let quantity = parseInt(quantityElement.textContent);
                if (quantity < maxStock) {
                    quantity++;
                    quantityElement.textContent = quantity;
                    quantityInput.value = quantity;
                    selectedQuantityInput.value = quantity;
                    outOfStockMessage.classList.add('hidden');
                } else {
                    outOfStockMessage.classList.remove('hidden');
                    availableStockElement.textContent = maxStock;
                }
            });

            addToCartButton.addEventListener('click', function () {
                if (selectedSizeInput.value === '' || selectedColorInput.value === '') {
                    alert('Please select a size and color.');
                    return;
                }

                @if (Auth::check())
                    document.getElementById('add-to-cart-form').submit();
                @else
                    window.location.href = "{{ route('login') }}";
                @endif
            });

            // Tab switching
            const descriptionTab = document.getElementById('descriptionTab');
            const additionalInfoTab = document.getElementById('additionalInfoTab');
            const reviewsTab = document.getElementById('reviewsTab');

            const descriptionContent = document.getElementById('descriptionContent');
            const additionalInfoContent = document.getElementById('additionalInfoContent');
            const reviewsContent = document.getElementById('reviewsContent');

            descriptionTab.addEventListener('click', function () {
                descriptionContent.classList.remove('hidden');
                additionalInfoContent.classList.add('hidden');
                reviewsContent.classList.add('hidden');
            });

            additionalInfoTab.addEventListener('click', function () {
                descriptionContent.classList.add('hidden');
                additionalInfoContent.classList.remove('hidden');
                reviewsContent.classList.add('hidden');
            });

            reviewsTab.addEventListener('click', function () {
                descriptionContent.classList.add('hidden');
                additionalInfoContent.classList.add('hidden');
                reviewsContent.classList.remove('hidden');
            });
        });
    </script>
</x-app-layout>