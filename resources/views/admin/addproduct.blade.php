<x-guest-layout>
    <main class="flex-1 p-8 ml-64 overflow-y-auto">
        <div class="flex items-center justify-center flex-1">
            <div class="w-full max-w-4xl p-8 bg-white rounded-lg shadow-lg">
                <h2 class="text-3xl font-bold text-center text-gray-800 mb-8">Add Products</h2>

                @if (session('success'))
                    <div class="p-4 mb-6 text-green-800 bg-green-100 border-l-4 border-green-500 rounded">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('admin.storeproduct') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <!-- Product Name -->
                        <div>
                            <label for="productName" class="block mb-3 text-sm font-medium text-gray-700">Product Name</label>
                            <input type="text" name="product_name" id="productName" class="w-full px-4 py-3 text-sm border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>
                        </div>

                        <!-- Product Category -->
                        <div>
                            <label for="productCategory" class="block mb-3 text-sm font-medium text-gray-700">Product Category</label>
                            <select name="product_category" id="productCategory" class="w-full px-4 py-3 text-sm border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>
                                <option value="">Select Category</option>
                                <option value="Men">Men</option>
                                <option value="Women">Women</option>
                                <option value="Accessories">Accessories</option>
                            </select>
                        </div>

                        <!-- Product Price -->
                        <div>
                            <label for="productPrice" class="block mb-3 text-sm font-medium text-gray-700">Product Price</label>
                            <input type="number" name="product_price" id="productPrice" class="w-full px-4 py-3 text-sm border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" min="1" required>
                        </div>

                        <!-- Product Stock -->
                        <div>
                            <label for="productStock" class="block mb-3 text-sm font-medium text-gray-700">Product Stock</label>
                            <input type="number" name="product_stock" id="productStock" class="w-full px-4 py-3 text-sm border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" min="1" required>
                        </div>

                        <!-- Size -->
                        <div>
                            <label class="block mb-3 text-sm font-medium text-gray-700">Size</label>
                            <div class="flex flex-wrap gap-3">
                                <label class="inline-flex items-center">
                                    <input type="checkbox" name="size[]" value="XS" class="text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                                    <span class="ml-2 text-gray-700">XS</span>
                                </label>
                                <label class="inline-flex items-center">
                                    <input type="checkbox" name="size[]" value="S" class="text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                                    <span class="ml-2 text-gray-700">S</span>
                                </label>
                                <!-- Add more sizes as needed -->
                            </div>
                        </div>

                        <!-- Color -->
                        <div>
                            <label class="block mb-3 text-sm font-medium text-gray-700">Color</label>
                            <div class="flex flex-wrap gap-3">
                                <label class="inline-flex items-center">
                                    <input type="checkbox" name="color[]" value="Red" class="text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                                    <span class="ml-2 text-gray-700">Red</span>
                                </label>
                                <label class="inline-flex items-center">
                                    <input type="checkbox" name="color[]" value="Green" class="text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                                    <span class="ml-2 text-gray-700">Green</span>
                                </label>
                                <!-- Add more colors as needed -->
                            </div>
                        </div>
                    </div>

                    <!-- Product Description -->
                    <div>
                        <label for="productDescription" class="block mb-3 text-sm font-medium text-gray-700">Product Description</label>
                        <textarea name="product_description" id="productDescription" rows="5" class="w-full px-4 py-3 text-sm border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"></textarea>
                    </div>

                    <!-- Image Upload Section -->
                    <div>
                        <label class="block mb-3 text-sm font-medium text-gray-700">Upload Product Images</label>
                        <div 
                            id="uploadContainer" 
                            class="flex flex-col items-center justify-center p-8 border-2 border-dashed border-gray-300 rounded-lg cursor-pointer hover:bg-gray-50 transition-colors"
                            onclick="document.getElementById('product_images').click()"
                        >
                            <svg class="w-10 h-10 mb-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path>
                            </svg>
                            <p class="text-gray-500 text-center">
                                Drag & drop images here or <span class="text-blue-500 underline">browse</span>
                            </p>
                            <input 
                                type="file" 
                                id="product_images" 
                                name="product_images[]" 
                                accept="image/*" 
                                class="hidden" 
                                multiple 
                                onchange="previewMultipleImages(event)"
                            >
                        </div>
                        <!-- Preview Container -->
                        <div id="imagePreviewContainer" class="grid grid-cols-2 md:grid-cols-4 gap-4 mt-6">
                            <!-- Image previews will appear here -->
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div>
                        <button type="submit" name="submit" class="w-full px-6 py-3 text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors">
                            Add Product
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>
</x-guest-layout>