<div>
    <input 
        type="text" 
        wire:model="search" 
        placeholder="Search for products..." 
        class="w-full py-3 pl-4 pr-12 text-sm border rounded-full shadow-sm focus:ring-2 focus:ring-[#B1964E]"
    >
    <div class="grid grid-cols-2 gap-8 mt-4 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-4 xl:grid-cols-5">
        @forelse ($products as $product)
            <div class="transition-transform bg-white border border-gray-300 rounded-lg shadow-md hover:shadow-2xl hover:scale-105">
                <div class="relative w-full h-56 overflow-hidden rounded-t-lg">
                    <img src="{{ asset('storage/' . $product->images[0]) }}" alt="{{ $product->name }}" class="object-cover w-full h-full transition-transform duration-300 hover:scale-110">
                    <span class="absolute px-3 py-1 text-xs font-semibold text-white rounded-full top-2 left-2 bg-gradient-to-r from-blue-500 to-teal-400">
                        {{ $product->category }}
                    </span>
                </div>
                <div class="p-2">
                    <h3 class="text-lg font-semibold text-gray-800 truncate">
                        {{ $product->name }}
                    </h3>
                    <p class="mt-1 text-sm text-gray-500">Category: {{ $product->category }}</p>
                    <p class="mt-1 text-lg font-bold text-green-600">Rs. {{ number_format($product->price) }}</p>
                </div>
            </div>
        @empty
            <p class="col-span-4 text-center text-gray-500">No products found.</p>
        @endforelse
    </div>
</div>
