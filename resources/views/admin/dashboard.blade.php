<x-guest-layout>
            <!-- Main Content -->
            <main class="flex-1 p-6 ml-64 overflow-y-auto pt-0">
                <header class="flex items-center justify-between pb-4 mb-4 border-b">
                    <h1 class="text-2xl font-semibold text-gray-700">Admin Dashboard</h1>
                    <a href="{{ route('admin.addproduct') }}" class="px-4 py-2 text-white bg-blue-600 rounded hover:bg-blue-600">
                        <i class="mr-2 fas fa-plus"></i> Add Product
                    </a>
                </header>

                <!-- Cards -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <!-- Sales -->
                    <div class="bg-cyan-600 text-white rounded-lg shadow-lg p-4">
                        <h2 class="text-xl font-bold text-center">SALES REVENUE</h2>
                        <p class="text-6xl font-semibold text-center mt-6">29,000</p>
                    </div>
            
                    <!-- Total Number of Products -->
                    <div class="bg-amber-500 text-white rounded-md shadow-lg p-4">
                        <h2 class="text-xl font-bold text-center">TOTAL PRODUCTS</h2>
                        <p class="text-6xl font-semibold text-center mt-2">52</p>
                        <hr class="my-3">
                        <!-- Mens: Count -->
                        <p class="flex justify-between mx-12">
                            <span>Mens:</span>
                            <span>10</span>
                        </p>
                        <!-- Womens: Count -->
                        <p class="flex justify-between mx-12">
                            <span>Womens:</span>
                            <span>20</span>
                        </p>
                        <!-- Accessories: Count -->
                        <p class="flex justify-between mx-12">
                            <span>Accessories:</span>
                            <span>25</span>
                        </p>
                    </div>
            
                    <!-- Total Number of Users -->
                    <div class="bg-pink-700 text-white rounded-lg shadow-lg p-4">
                        <h2 class="text-xl font-bold">TOTAL USERS</h2>
                        <p class="text-6xl font-semibold text-center mt-2">21</p>
                        <hr class="my-3">
                        <p class="flex justify-between mx-12">
                            <span>Admins: </span>
                            <span>10</span>
                        </p>
            
                        <p class="flex justify-between mx-12">
                            <span>Customers: </span>
                            <span>11</span>
                        </p>
                    </div>
                </div>

                <!-- Second Row of Cards -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">
                    <!-- Total Number of Blogs -->
                    <div class="bg-gray-300 text-black rounded-lg shadow-lg p-6">
                        <h2 class="text-xl font-bold text-center">TOTAL BLOGS</h2>
                        <p class="text-6xl font-semibold text-center mt-6">10</p>
                    </div>

                    <!-- Total Number of Inquiries -->
                    <div class="bg-gray-300 text-black rounded-lg shadow-lg p-6">
                        <h2 class="text-xl font-bold text-center">PENDING INQUIRIES</h2>
                        <p class="text-6xl font-semibold text-center mt-2">10</p>
                        <hr class="my-4 border-gray-400">
                        <p class="flex justify-between mx-12">
                            <span>Total Inquiries:</span>
                            <span>11</span>
                        </p>
                    </div>
                </div>
    
                <!-- Orders Table -->
                <div class="mt-6 bg-white rounded-lg shadow-md">
                    <div class="p-6">
                        <h2 class="mb-4 text-xl font-semibold text-gray-700">Orders</h2>
                        <div class="h-64 overflow-y-scroll border border-gray-200 rounded-lg">
                            <table class="w-full text-left border-collapse">
                                <thead>
                                    <tr class="text-gray-700 bg-gray-100 border-b border-gray-200">
                                        <th class="px-6 py-3">Customer Name</th>
                                        <th class="px-6 py-3">Item</th>
                                        <th class="px-6 py-3">Quantity</th>
                                        <th class="px-6 py-3">Quality Level</th>
                                        <th class="px-6 py-3">Prices</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="border-b hover:bg-gray-50">
                                        <td class="px-6 py-3 text-gray-700">Hirusha Gamage</td>
                                        <td class="px-6 py-3 text-gray-700">Carrot</td>
                                        <td class="px-6 py-3 text-gray-700">50Kg</td>
                                        <td class="px-6 py-3 text-gray-700">Human Consumption</td>
                                        <td class="px-6 py-3 font-semibold text-green-500">Rs. 3000</td>
                                    </tr>
                                    <tr class="border-b hover:bg-gray-50">
                                        <td class="px-6 py-3 text-gray-700">Hirusha Gamage</td>
                                        <td class="px-6 py-3 text-gray-700">Carrot</td>
                                        <td class="px-6 py-3 text-gray-700">50Kg</td>
                                        <td class="px-6 py-3 text-gray-700">Human Consumption</td>
                                        <td class="px-6 py-3 font-semibold text-green-500">Rs. 5000</td>
                                    </tr>
                                    <!-- Additional rows can be added here -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>    
            </main>
        </div>
    </div>
</x-guest-layout>
