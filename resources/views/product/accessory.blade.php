<x-app-layout>
    
    <section class="pt-20 banner">
        <div class="text-center  bg-[url('assets/image/banner2.png')] bg-cover  h-[140px] items-center justify-center flex">
            <h1 class="text-3xl font-semibold text-white ">Accessories</h1>
        </div>    
    </section>

    <!-- Filter & Search Section -->
    <section class="flex flex-col items-center p-6 mx-4 space-y-6 -translate-y-8 bg-white rounded-md shadow-lg md:flex-row md:justify-between md:space-y-0">
       <!-- Search Bar -->
       <div class="relative flex items-center w-full max-w-lg mx-4">
            <form method="GET" action="" class="flex w-full">
                <!-- Input Field -->
                <input 
                    type="text" 
                    name="search" 
                    value="{{ request('search') }}" 
                    placeholder="Search for products..." 
                    class="w-full py-3 pl-4 pr-12 text-sm border rounded-full shadow-sm focus:ring-2 focus:ring-[#B1964E]"
                >
                <!-- Search Button -->
                <button 
                    type="submit" 
                    class="absolute inset-y-0 flex items-center text-gray-400 right-3 hover:text-[#B1964E]"
                >
                    <i class="fa-solid fa-search"></i>
                </button>
            </form>
        </div>
        
        <!-- Sort Dropdown -->
        <form method="GET" action="" class="inline">
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
    </section>

    <section class="relative flex flex-col mx-4 mb-6 space-y-6 md:flex-row md:space-y-0 md:space-x-6">    
        <!-- Product Grid -->
        <div class="w-full p-4 bg-white rounded-lg shadow-md md:w-4/3">
            <h2 class="mb-4 text-2xl font-bold">Men's Products</h2>
            <div class="grid grid-cols-2 gap-8 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-4 xl:grid-cols-5">
                @forelse ($products as $product)
                <a href="{{ route('product.details', ['id' => $product->id]) }}" class="transition-transform bg-white border border-gray-300 rounded-lg shadow-md hover:shadow-2xl hover:scale-105">
                    <!-- Image Section -->
                    <div class="relative w-full h-56 overflow-hidden rounded-t-lg">
                        <img src="{{ asset('storage/' . $product->images[0]) }}" alt="{{ $product->name }}" class="object-cover w-full h-full transition-transform duration-300 hover:scale-110">
                        <!-- Category Badge -->
                        <span class="absolute px-3 py-1 text-xs font-semibold text-white rounded-full top-2 left-2 bg-gradient-to-r from-blue-500 to-teal-400">
                            {{ $product->category }}
                        </span>
                    </div>
                
                    <!-- Product Info Section -->
                    <div class="p-2">
                        <h3 class="text-lg font-semibold text-gray-800 truncate">
                            {{ $product->name }}
                        </h3>
                        <p class="mt-1 text-sm text-gray-500">Category: {{ $product->category }}</p>
                        <p class="mt-1 text-lg font-bold text-green-600">Rs. {{ number_format($product->price) }}</p>
                    </div>
                
                    <!-- Add to Cart Section -->
                    <form action="" method="POST" class="">
                        @csrf
                        <button type="submit" class="flex items-center justify-center w-full px-4 py-2 text-white bg-blue-600 rounded-lg shadow hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h18M4 7h16l-1.6 9.6a4 4 0 01-3.9 3.4H6.5a4 4 0 01-3.9-3.4L4 7zm4.8 5h8.4" />
                            </svg>
                            Add to Cart
                        </button>
                    </form>
                </a>
                
                @empty
                <p>No products found for the selected filters.</p>
                @endforelse
            </div>
            
        </div>
    </section>
    
</x-app-layout>