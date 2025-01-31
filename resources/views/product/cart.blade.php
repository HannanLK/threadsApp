<x-app-layout>
    <div class="container flex-grow max-w-6xl px-4 pt-32 pb-10 mx-auto md:px-8">

        <!-- Page Title -->
        <h2 class="mb-8 font-serif text-3xl font-extrabold text-center text-gray-800">Your Shopping Cart</h2>
    
        @if ($cartItems->isEmpty())
            <!-- Empty Cart Message -->
            <div class="flex flex-col items-center justify-center p-10 bg-white rounded-lg shadow-lg">
                <p class="mb-4 text-xl font-medium text-gray-600">Your cart is empty!</p>
                <a href="/shop" class="px-6 py-3 text-white bg-[#CDAE71] rounded-lg hover:bg-[#B1964E]">
                    Shop Now
                </a>
            </div>
        @else
            <div class="flex flex-col lg:flex-row lg:space-x-8">
                <!-- Cart Items -->
                <div class="flex-grow space-y-6">
                    @php $totalAmount = 0; @endphp
                    @foreach ($cartItems as $cartItem)
                        @php
                            $itemTotal = $cartItem->quantity * $cartItem->product->price;
                            $totalAmount += $itemTotal;
                        @endphp
                        <div class="flex items-center p-4 bg-white rounded-lg shadow-md">
                            <img src="{{ asset('storage/' .$cartItem->product->images[0]) }}" 
                                     alt="{{ $cartItem->product->name }}" 
                                     class="object-cover mr-4 rounded-lg shadow-md w-14 ">
                            <div class="flex-grow">
                                <h3 class="text-lg font-bold text-gray-800">{{ $cartItem->product->name }}</h3>
                                <p class="text-sm text-gray-500">Size: {{ $cartItem->size }} | Color: {{ $cartItem->color }}</p>
                                <p class="mt-1 text-lg font-semibold text-indigo-600">Rs.{{ $cartItem->product->price }}</p>
                            </div>
                            <div class="text-right">
                                <p class="mb-2 text-gray-600">Qty: <span class="font-bold">{{ $cartItem->quantity }}</span></p>
                                <p class="text-lg font-bold text-gray-800">Rs.{{ $itemTotal }}</p>
                                <form action="{{ route('cart.remove', $cartItem->id) }}" method="POST" class="inline-block mt-3">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
    
                <!-- Cart Summary -->
                <div class="mt-8 lg:mt-0 lg:w-1/3 lg:sticky lg:top-28">
                    <div class="p-6 text-black rounded-lg shadow-md bg-[#BFA86D]">
                        <h3 class="mb-4 font-serif text-2xl font-bold">Cart Summary</h3>
                        <p class="mb-2 text-lg font-semibold">Total Items: {{ $cartItems->count() }}</p>
                        <p class="mb-4 text-2xl font-extrabold">Rs.{{ $totalAmount }}</p>
                        <a href="{{ route('product.checkout') }}" class="block w-full px-6 py-3 mb-3 text-center text-white bg-black rounded-lg">
                            Proceed to Checkout
                        </a>
                        <a href="/shop" class="block w-full px-6 py-3 text-center text-gray-800 bg-gray-200 rounded-lg hover:bg-gray-300">
                            Continue Shopping
                        </a>
                    </div>
                </div>
            </div>
        @endif
    </div>
     
</x-app-layout>
