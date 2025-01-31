<x-guest-layout>

    <!-- Main Content Area -->
  <div class="flex-1 p-6 ml-64 overflow-y-auto">
      <div class="w-full max-w-6xl bg-white rounded-lg shadow-md">
        <h2 class="pt-6 text-3xl font-semibold text-center text-gray-800">Manage Products</h2>
        <div class="flex justify-center mt-2 mb-6">
            <div class="w-24 h-1 bg-red-500"></div>
        </div>

        @if (session('success'))
            <div class="p-4 mb-4 text-green-800 bg-green-200 border border-green-300 rounded">
                {{ session('success') }}
            </div>
        @endif
  
             <!-- Product Table -->
             <div class="p-6">
                <table class="w-full border-collapse table-auto">
                    <thead class="bg-blue-500">
                        <tr class="text-white">
                            <th class="p-4 text-left">Image</th>
                            <th class="p-4 text-left">Name</th>
                            <th class="p-4 text-left">Category</th>
                            <th class="p-4 text-left">Price</th>
                            <th class="p-4 text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                            <tr class="bg-white border-b hover:bg-gray-100">
                                <td class="p-4">
                                    <img src="{{ asset('storage/' . $product->images[0]) }}" alt="product image" class="w-16 h-16 rounded-lg">
                                </td>
                                <td class="p-4 font-medium text-gray-700">{{ $product->name }}</td>
                                <td class="p-4 text-gray-600">{{ $product->category }}</td>
                                <td class="p-4 text-gray-600">Rs.{{ number_format($product->price, 2) }}</td>
                                <td class="p-4">
                                    <div class="flex justify-center space-x-4">
                                        <button onclick="openEditModal({{ $product }})" class="px-4 py-2 text-sm font-medium text-white bg-green-500 rounded-lg hover:bg-green-600">Edit</button>
                                        <form method="POST" action="{{ route('admin.deleteProduct', $product->id) }}" onsubmit="return confirm('Are you sure you want to delete this product?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-red-500 rounded-lg hover:bg-red-600">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
      </div>
  </div>
  
  <!-- Edit Product Modal -->
  <div id="editModal" class="fixed inset-0 z-50 flex items-center justify-center hidden bg-black bg-opacity-50">
      <div class="w-full max-w-lg p-6 bg-white rounded-lg shadow-lg max-h-[90vh] overflow-y-auto">
          <h3 class="mb-4 text-lg font-semibold text-center text-gray-700">Edit Product</h3>
          <form id="editProductForm" method="POST" action="" enctype="multipart/form-data">
              @csrf
              @method('POST')
              <input type="hidden" name="_method" value="PUT">
              <input type="hidden" name="id" id="editProductId">
              <div class="space-y-4">
                  <div>
                      <label for="editProductName" class="block text-sm font-medium text-gray-700">Product Name</label>
                      <input type="text" name="product_name" id="editProductName" class="w-full px-4 py-2 text-sm border border-gray-300 rounded-md focus:outline-none focus:border-red-500" required>
                  </div>
                  <div>
                      <label for="editProductCategory" class="block text-sm font-medium text-gray-700">Product Category</label>
                      <select name="product_category" id="editProductCategory" class="w-full px-4 py-2 text-sm border border-gray-300 rounded-md focus:outline-none focus:border-red-500" required>
                          <option value="Men">Men</option>
                          <option value="Women">Women</option>
                          <option value="Kids">Kids</option>
                          <option value="Accessories">Accessories</option>
                      </select>
                  </div>
                  <div>
                      <label for="editProductPrice" class="block text-sm font-medium text-gray-700">Product Price</label>
                      <input type="number" name="product_price" id="editProductPrice" class="w-full px-4 py-2 text-sm border border-gray-300 rounded-md focus:outline-none focus:border-red-500" min="1" required>
                  </div>
                  <div>
                      <label for="editProductStock" class="block text-sm font-medium text-gray-700">Product Stock</label>
                      <input type="number" name="product_stock" id="editProductStock" class="w-full px-4 py-2 text-sm border border-gray-300 rounded-md focus:outline-none focus:border-red-500" min="1" required>
                  </div>
                  <div>
                      <label for="editProductDescription" class="block text-sm font-medium text-gray-700">Product Description</label>
                      <textarea name="product_description" id="editProductDescription" rows="4" class="w-full px-4 py-2 text-sm border border-gray-300 rounded-md focus:outline-none focus:border-red-500"></textarea>
                  </div>
                  <div>
                      <label for="editProductSizes" class="block text-sm font-medium text-gray-700">Product Sizes</label>
                      <div id="editProductSizes" class="flex space-x-2">
                          <label class="flex items-center space-x-2">
                              <input type="checkbox" name="size[]" value="XS" class="text-green-600 form-checkbox focus:ring-0">
                              <span class="text-gray-700">XS</span>
                          </label>
                          <label class="flex items-center space-x-2">
                              <input type="checkbox" name="size[]" value="S" class="text-green-600 form-checkbox focus:ring-0">
                              <span class="text-gray-700">S</span>
                          </label>
                          <label class="flex items-center space-x-2">
                              <input type="checkbox" name="size[]" value="M" class="text-green-600 form-checkbox focus:ring-0">
                              <span class="text-gray-700">M</span>
                          </label>
                          <label class="flex items-center space-x-2">
                              <input type="checkbox" name="size[]" value="L" class="text-green-600 form-checkbox focus:ring-0">
                              <span class="text-gray-700">L</span>
                          </label>
                          <label class="flex items-center space-x-2">
                              <input type="checkbox" name="size[]" value="XL" class="text-green-600 form-checkbox focus:ring-0">
                              <span class="text-gray-700">XL</span>
                          </label>
                      </div>
                  </div>
                  <div>
                      <label for="editProductColors" class="block text-sm font-medium text-gray-700">Product Colors</label>
                      <div id="editProductColors" class="flex space-x-2">
                          <label class="flex items-center space-x-2">
                              <input type="checkbox" name="color[]" value="Red" class="text-green-600 form-checkbox focus:ring-0">
                              <span class="text-gray-700">Red</span>
                          </label>
                          <label class="flex items-center space-x-2">
                              <input type="checkbox" name="color[]" value="Green" class="text-green-600 form-checkbox focus:ring-0">
                              <span class="text-gray-700">Green</span>
                          </label>
                          <label class="flex items-center space-x-2">
                              <input type="checkbox" name="color[]" value="Blue" class="text-green-600 form-checkbox focus:ring-0">
                              <span class="text-gray-700">Blue</span>
                          </label>
                          <label class="flex items-center space-x-2">
                              <input type="checkbox" name="color[]" value="Black" class="text-green-600 form-checkbox focus:ring-0">
                              <span class="text-gray-700">Black</span>
                          </label>
                          <label class="flex items-center space-x-2">
                              <input type="checkbox" name="color[]" value="White" class="text-green-600 form-checkbox focus:ring-0">
                              <span class="text-gray-700">White</span>
                          </label>
                      </div>
                  </div>
                  <div>
                      <label for="editProductImages" class="block mb-2 text-sm font-medium text-gray-700">Product Images</label>
                      <div id="currentImages" class="flex mb-2 space-x-2">
                          <!-- Current images will be displayed here -->
                      </div>
                      <div 
                          id="uploadContainer" 
                          class="flex flex-col items-center justify-center p-6 transition border-2 border-gray-400 border-dashed rounded-lg cursor-pointer hover:bg-gray-200"
                          onclick="document.getElementById('editProductImages').click()"
                      >
                          <div class="text-gray-500">
                              Drop your images here, or <span class="text-blue-500 underline">browse</span>
                          </div>
                          <input 
                              type="file" 
                              id="editProductImages" 
                              name="product_images[]" 
                              accept="image/*" 
                              class="hidden" 
                              multiple 
                              onchange="previewMultipleImages(event)"
                          >
                      </div>
                      <div id="imagePreviewContainer" class="grid grid-cols-5 gap-4 mt-4">
                          <!-- New image previews will appear here -->
                      </div>
                  </div>
                  <div class="flex justify-end">
                      <button type="button" onclick="closeEditModal()" class="px-4 py-2 mr-2 text-white bg-gray-400 rounded-lg hover:bg-gray-500">Cancel</button>
                      <button type="submit" class="px-4 py-2 text-white bg-blue-500 rounded-lg hover:bg-blue-600">Update</button>
                  </div>
              </div>
          </form>
      </div>
  </div>
  
  <script>
      function openEditModal(product) {
          document.getElementById('editProductId').value = product.id;
          document.getElementById('editProductForm').action = `/admin/updateproduct/${product.id}`;
          document.getElementById('editProductName').value = product.name;
          document.getElementById('editProductCategory').value = product.category;
          document.getElementById('editProductPrice').value = product.price;
          document.getElementById('editProductStock').value = product.stock;
          document.getElementById('editProductDescription').value = product.description;
  
          // Display current sizes
          const sizeInputs = document.querySelectorAll('#editProductSizes input');
          sizeInputs.forEach(input => {
              input.checked = product.sizes.includes(input.value);
          });
  
          // Display current colors
          const colorInputs = document.querySelectorAll('#editProductColors input');
          colorInputs.forEach(input => {
              input.checked = product.colors.includes(input.value);
          });
  
          // Display current images
          const currentImagesContainer = document.getElementById('currentImages');
          currentImagesContainer.innerHTML = '';
          product.images.forEach(image => {
              const imgElement = document.createElement('div');
              imgElement.className = 'relative w-20 h-20 overflow-hidden bg-gray-100 rounded-lg shadow-md';
              const img = document.createElement('img');
              img.src = `/storage/${image}`;
              img.alt = "Current Image";
              img.className = 'object-cover w-full h-full';
              imgElement.appendChild(img);
              currentImagesContainer.appendChild(imgElement);
          });
  
          document.getElementById('editModal').classList.remove('hidden');
        }
  
        function closeEditModal() {
          document.getElementById('editModal').classList.add('hidden');
        }
  </script>
  
</x-guest-layout>