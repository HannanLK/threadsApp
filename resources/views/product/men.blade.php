<x-app-layout>
    <section class="banner">
        <div class="text-center bg-[url('assets/image/banner/men3.avif')] bg-cover h-[300px] items-center justify-center flex relative">
            <h1 class="text-3xl font-normal tracking-wide text-black">Men's Collection</h1>

            <!-- Search Bar (Bottom Left) -->
            <div class="absolute bottom-4 left-4 w-full max-w-lg">
                <form method="GET" action="" class="flex w-full">
                    <!-- Input Field -->
                    <input 
                        type="text" 
                        name="search" 
                        value="{{ request('search') }}" 
                        placeholder="Search for products..." 
                        class="w-full py-3 pl-4 pr-12 text-sm border rounded-full shadow-sm focus:ring-2 focus:ring-[#B1964E] bg-transparent text-white"
                    >
                    <!-- Search Button -->
                    <button 
                        type="submit" 
                        class="absolute inset-y-0 flex items-center text-gray-400 right-3 hover:text-[#B1964E] bg-transparent"
                    >
                        <i class="fa-solid fa-search"></i>
                    </button>
                </form>
            </div>

            <!-- Sort Dropdown (Bottom Right) -->
            <form method="GET" action="" class="absolute bottom-4 right-4">
                <input type="hidden" name="search" value="{{ request('search') }}">
                <select 
                    name="sort" 
                    onchange="this.form.submit()" 
                    class="px-6 py-3 text-sm bg-white border rounded-lg shadow-md focus:ring-2 focus:ring-[#B1964E]"
                >
                    <option value="" {{ !request('sort') ? 'selected' : '' }}>Sort by Price</option>
                    <option value="low-high" {{ request('sort') == 'low-high' ? 'selected' : '' }}>Low to High</option>
                    <option value="high-low" {{ request('sort') == 'high-low' ? 'selected' : '' }}>High to Low</option>
                </select>
            </form>
        </div>
    </section>

    <section class="relative flex flex-col mx-4 mb-6 space-y-6 md:flex-row md:space-y-0 md:space-x-6">
    
        <!-- Product Grid -->
        <div class="w-full p-4 rounded-lg md:w-4/3">
            <h2 class="mb-4 text-2xl font-bold">Men's Products</h2>
            <div class="grid grid-cols-2 gap-8 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-4 xl:grid-cols-5">

                @foreach($products as $product)
                <div class="relative group" data-aos="zoom-in">
                    <a href="{{ route('product.details', ['id' => $product->id]) }}" class="block">
                        <div class="w-full overflow-hidden bg-gray-200 rounded-md aspect-w-1 aspect-h-1 lg:aspect-none lg:h-80">
                            <img src="{{ asset('storage/' . $product->images[0]) }}" alt="{{ $product->name }}" class="object-cover w-full h-full transition-transform duration-300 hover:scale-110">
                        </div>
                    </a>
                    <div class="flex justify-between items-center mt-4">
                        <div>
                            <h3 class="text-sm text-gray-700">
                                <a href="{{ route('product.details', ['id' => $product->id]) }}">
                                    <span aria-hidden="true" class="absolute inset-0"></span>
                                    {{ $product->name }}
                                </a>
                            </h3>
                            <p class="mt-1 text-sm text-gray-500">Rs {{ number_format($product->price, 2) }}</p>
                        </div>
                        <a href="{{ route('product.details', ['id' => $product->id]) }}">
                            <button class="p-2 bg-white rounded-full shadow-md hover:bg-gray-100 transition">
                                <i class="fa-solid fa-cart-shopping fa-lg text-red-500"></i>
                            </button>
                        </a>                        
                    </div>
                </div>
            @endforeach

            {{-- @foreach ($products as $product)
                <a href="{{ route('product.details', ['id' => $product->id]) }}" class="transition-transform bg-white border border-gray-300 rounded-lg shadow-md hover:shadow-2xl hover:scale-105">
                    <!-- Image Section -->
                    <div class="relative w-full h-56 overflow-hidden rounded-t-lg">
                        <img src="{{ asset('storage/' . $product->images[0]) }}" alt="{{ $product->name }}" class="object-cover w-full h-full transition-transform duration-300 hover:scale-110">
                    </div>
                    <!-- Product Info Section -->
                    <div class="p-2">
                        <h3 class="text-lg font-semibold text-gray-800 truncate">
                            {{ $product->name }}
                        </h3>
                        <p class="mt-1 text-lg font-bold text-green-600">Rs. {{ number_format($product->price) }}</p>
                    </div>
                    <!-- Add to Cart Button -->
                    <form action="{{ route('cart.add', ['id' => $product->id]) }}" method="GET">
                        <button type="submit" class="p-2 bg-white rounded-full shadow-md hover:bg-gray-100 transition">
                            <i class="fa-solid fa-cart-shopping fa-lg text-red-500"></i>
                        </button>
                    </form>
                </a>
            @endforeach --}}
            </div>
        </div>
        
    </section>

</x-app-layout>
