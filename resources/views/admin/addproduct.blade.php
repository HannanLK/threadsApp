<x-guest-layout>
    <main class="flex-1 p-6 ml-64 overflow-y-auto">
        <div class="flex items-center justify-center flex-1">
            <div class="w-full max-w-4xl p-8 bg-gray-100 rounded-lg">
                <h2 class="text-2xl font-semibold text-center text-gray-700">Add Products</h2>
                <div class="flex justify-center mt-1 mb-6">
                    <div class="w-20 h-1 bg-red-500"></div>
                </div>

                @if (session('success'))
                    <div class="p-4 mb-4 text-green-800 bg-green-200 border border-green-300 rounded">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('admin.storeproduct') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    <div class="grid grid-cols-2 gap-6">
                        <!-- Product Name -->
                        <div>
                            <label for="productName" class="block mb-2 font-medium text-gray-700">Product Name</label>
                            <input type="text" name="product_name" id="productName" class="w-full px-4 py-2 text-sm border border-gray-400 rounded-md focus:outline-none focus:border-red-500" required>
                        </div>

                        <!-- Product Category -->
                        <div>
                            <label for="productCategory" class="block mb-2 font-medium text-gray-700">Product Category</label>
                            <select name="product_category" id="productCategory" class="w-full px-4 py-2 text-sm font-medium border border-gray-400 rounded-md focus:outline-none focus:border-red-500" required>
                                <option value="">Select Category</option>
                                <option value="Men">Men</option>
                                <option value="Women">Women</option>
                                <option value="Kids">Kids</option>
                                <option value="Accessories">Accessories</option>
                            </select>
                        </div>

                        <!-- Product Price -->
                        <div>
                            <label for="productPrice" class="block mb-2 font-medium text-gray-700">Product Price</label>
                            <input type="number" name="product_price" id="productPrice" class="w-full px-4 py-2 text-sm border border-gray-400 rounded-md focus:outline-none focus:border-red-500" min="1" required>
                        </div>

                        <!-- Product Stock -->
                        <div>
                            <label for="productStock" class="block mb-2 font-medium text-gray-700">Product Stock</label>
                            <input type="number" name="product_stock" id="productStock" class="w-full px-4 py-2 text-sm border border-gray-400 rounded-md focus:outline-none focus:border-red-500" min="1" required>
                        </div>

                        <!-- Size -->
                        <div>
                            <label for="size" class="block mb-2 font-medium text-gray-700">Size</label>
                            <div id="size" class="flex space-x-2">
                                <label class="flex items-center space-x-2">
                                    <input type="checkbox" name="size[]" value="XS" class="text-green-600 form-checkbox focus:ring-0">
                                    <span class="text-gray-700">XS</span>
                                </label>
                                <label class="flex items-center space-x-2">
                                    <input type="checkbox" name="size[]" value="S" class="text-green-600 form-checkbox focus:ring-0">
                                    <span class="text-gray-700">S</span>
                                </label>
                            </div>
                        </div>

                        <!-- Color -->
                        <div>
                            <label for="color" class="block mb-2 font-medium text-gray-700">Color</label>
                            <div id="color" class="flex space-x-2">
                                <label class="flex items-center space-x-2">
                                    <input type="checkbox" name="color[]" value="Red" class="text-green-600 form-checkbox focus:ring-0">
                                    <span class="text-gray-700">Red</span>
                                </label>
                                <label class="flex items-center space-x-2">
                                    <input type="checkbox" name="color[]" value="Green" class="text-green-600 form-checkbox focus:ring-0">
                                    <span class="text-gray-700">Green</span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- Product Description -->
                    <div>
                        <label for="productDescription" class="block mb-2 font-medium text-gray-700">Product Description</label>
                        <textarea name="product_description" id="productDescription" rows="5" class="w-full px-4 py-2 text-sm border border-gray-400 rounded-md focus:outline-none focus:border-red-500"></textarea>
                    </div>

                    <!-- Image Upload Section -->
                    <div class="mb-6">
                        <label for="product_images" class="block mb-2 font-medium text-gray-700">Upload Product Images</label>
                        <div 
                            id="uploadContainer" 
                            class="flex flex-col items-center justify-center p-6 transition border-2 border-gray-400 border-dashed rounded-lg cursor-pointer hover:bg-gray-200"
                            onclick="document.getElementById('product_images').click()"
                        >
                            <div class="text-gray-500">
                                Drop your images here, or <span class="text-blue-500 underline">browse</span>
                            </div>
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
                        <div id="imagePreviewContainer" class="grid grid-cols-5 gap-4 mt-4">
                            <!-- Image previews will appear here -->
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div>
                        <button type="submit" name="submit" class="w-full py-2 text-white bg-red-500 rounded-md hover:bg-red-600 focus:outline-none focus:bg-red-600">Add Product</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
</x-guest-layout>

