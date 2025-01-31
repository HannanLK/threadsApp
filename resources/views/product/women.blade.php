<x-app-layout>
    <!-- Header Section -->
    @include('layouts.header')

    <section class="pt-20 banner">
        <div class="text-center  bg-[url('assets/image/banner4.png')] bg-cover  h-[140px] items-center justify-center flex">
            <h1 class="text-3xl font-semibold text-white ">Women's Collection</h1>
        </div>    
    </section>

   
    
    <!-- Filter & Search Section -->
    <section class="flex flex-col items-center p-6 mx-4 space-y-6 -translate-y-8 bg-white rounded-md shadow-lg md:flex-row md:justify-between md:space-y-0">
        <!-- Filter Button -->
        <button onclick="toggleSidebar()" class="px-6 py-2 text-sm text-white bg-[#CDAE71] rounded-lg shadow-md hover:bg-[#B1964E]">
            <i class="fa-solid fa-filter"></i> Filters
        </button>

        <!-- Search Bar -->
        <div class="relative flex items-center w-full max-w-lg mx-4">
            <form method="GET" action="{{ route('shop.index') }}" class="flex w-full">
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
        <form method="GET" action="{{ route('shop.index') }}" class="inline">
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
        <!-- Sidebar Filters -->
        <aside id="filter-sidebar" class="w-full p-4 bg-white rounded-lg shadow-md md:w-1/6">
            <h2 class="pb-2 mb-4 text-xl font-bold border-b">Filters</h2>
            <form method="GET" action="{{ route('shop.index') }}">
                <div class="space-y-4">
                    <!-- Color Filter -->
                    <div>
                        <button type="button" onclick="toggleDropdown('color')" class="flex justify-between w-full p-2 text-sm bg-[#E0D2B4] rounded-md hover:bg-[#B1964E]">
                            Color <span id="color-arrow" class="text-gray-600">▼</span>
                        </button>
                        <div id="color-dropdown" class="hidden mt-2 ml-4 space-y-2">
                            <label class="flex items-center space-x-2">
                                <input type="checkbox" name="color[]" value="Red" class="text-green-600 form-checkbox focus:ring-0" {{ in_array('Red', request('color', [])) ? 'checked' : '' }}>
                                <span class="text-gray-700">Red</span>
                            </label>
                            <label class="flex items-center space-x-2">
                                <input type="checkbox" name="color[]" value="Green" class="text-green-600 form-checkbox focus:ring-0" {{ in_array('Green', request('color', [])) ? 'checked' : '' }}>
                                <span class="text-gray-700">Green</span>
                            </label>
                            <label class="flex items-center space-x-2">
                                <input type="checkbox" name="color[]" value="Blue" class="text-green-600 form-checkbox focus:ring-0" {{ in_array('Blue', request('color', [])) ? 'checked' : '' }}>
                                <span class="text-gray-700">Blue</span>
                            </label>
                            <label class="flex items-center space-x-2">
                                <input type="checkbox" name="color[]" value="Black" class="text-green-600 form-checkbox focus:ring-0" {{ in_array('Black', request('color', [])) ? 'checked' : '' }}>
                                <span class="text-gray-700">Black</span>
                            </label>
                            <label class="flex items-center space-x-2">
                                <input type="checkbox" name="color[]" value="White" class="text-green-600 form-checkbox focus:ring-0" {{ in_array('White', request('color', [])) ? 'checked' : '' }}>
                                <span class="text-gray-700">White</span>
                            </label>
                        </div>
                    </div>
                   

                    <!-- Size Filter -->
                    <div>
                        <button type="button" onclick="toggleDropdown('size')" class="flex justify-between w-full p-2 text-sm bg-[#E0D2B4] rounded-md hover:bg-[#B1964E]">
                            Sizes<span id="size-arrow" class="text-gray-600">▼</span>
                        </button>
                        <div id="size-dropdown" class="hidden mt-2 ml-4 space-y-2">
                            <label class="flex items-center space-x-2">
                                <input type="checkbox" name="size[]" value="XS" class="text-green-600 form-checkbox focus:ring-0" {{ in_array('XS', request('size', [])) ? 'checked' : '' }}>
                                <span class="text-gray-700">XS</span>
                            </label>
                            <label class="flex items-center space-x-2">
                                <input type="checkbox" name="size[]" value="S" class="text-green-600 form-checkbox focus:ring-0" {{ in_array('S', request('size', [])) ? 'checked' : '' }}>
                                <span class="text-gray-700">S</span>
                            </label>
                            <label class="flex items-center space-x-2">
                                <input type="checkbox" name="size[]" value="M" class="text-green-600 form-checkbox focus:ring-0" {{ in_array('M', request('size', [])) ? 'checked' : '' }}>
                                <span class="text-gray-700">M</span>
                            </label>
                            <label class="flex items-center space-x-2">
                                <input type="checkbox" name="size[]" value="L" class="text-green-600 form-checkbox focus:ring-0" {{ in_array('L', request('size', [])) ? 'checked' : '' }}>
                                <span class="text-gray-700">L</span>
                            </label>
                            <label class="flex items-center space-x-2">
                                <input type="checkbox" name="size[]" value="XL" class="text-green-600 form-checkbox focus:ring-0" {{ in_array('XL', request('size', [])) ? 'checked' : '' }}>
                                <span class="text-gray-700">XL</span>
                            </label>
                        </div>
                    </div>

                    <!-- Price Filter -->
                    <div>
                        <h3 class="text-sm font-semibold">Price</h3>
                        <div class="flex items-center mt-2 space-x-2">
                            <input type="number" name="min_price" value="{{ request('min_price') }}" placeholder="Min" class="w-full px-4 py-2 text-sm border border-gray-300 rounded-md focus:outline-none focus:border-green-500">
                            <span>-</span>
                            <input type="number" name="max_price" value="{{ request('max_price') }}" placeholder="Max" class="w-full px-4 py-2 text-sm border border-gray-300 rounded-md focus:outline-none focus:border-green-500">
                        </div>
                    </div>
                </div>

                <!-- Apply Button -->
                <button type="submit" class="px-4 py-2 mt-4 text-white rounded bg-gradient-to-r from-indigo-500 to-blue-500 hover:from-indigo-400 hover:to-blue-400">
                    Apply Filters
                </button>
            </form>
        </aside>
    
        <!-- Product Grid -->
        <div class="w-full p-4 bg-white rounded-lg shadow-md md:w-4/3">
            <h2 class="mb-4 text-2xl font-bold">Men's Products</h2>
            <div class="grid grid-cols-2 gap-8 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-4 xl:grid-cols-5">
                @forelse ($products as $product)
                <a href="#" class="transition-transform bg-white border border-gray-300 rounded-lg shadow-md hover:shadow-2xl hover:scale-105">
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