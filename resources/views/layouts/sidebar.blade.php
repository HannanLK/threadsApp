<!-- Layout -->
    <div class="flex flex-1 pt-24 ">
        <!-- Sidebar -->
        <aside class="fixed left-0 top-0 flex flex-col justify-between w-64 h-screen bg-gradient-to-b from-gray-500 to-black shadow-lg pt-10 text-white">
            <!-- Navigation Links -->
            <nav class="p-6 space-y-4">
                <a href="{{ route('admin.dashboard') }}" 
                    class="block w-full py-2 px-4 rounded text-left bg-[#FFFFFF] text-[#000000] dark:bg-[#000000] dark:text-[#FFFFFF] hover:bg-[#000000] hover:text-[#FFFFFF] dark:hover:bg-[#6F6F6F] dark:hover:text-[#FFFFFF] flex items-center">
                    <i class="mr-3 fas fa-home"></i> Dashboard
                </a>
                <a href="{{ route('admin.viewproduct') }}" 
                    class="block w-full py-2 px-4 rounded text-left bg-[#FFFFFF] text-[#000000] dark:bg-[#000000] dark:text-[#FFFFFF] hover:bg-[#000000] hover:text-[#FFFFFF] dark:hover:bg-[#6F6F6F] dark:hover:text-[#FFFFFF] flex items-center">
                    <i class="mr-3 fa-regular fa-folder-open"></i> View Products
                </a>
                <a href="ViewAdmin" 
                    class="block w-full py-2 px-4 rounded text-left bg-[#FFFFFF] text-[#000000] dark:bg-[#000000] dark:text-[#FFFFFF] hover:bg-[#000000] hover:text-[#FFFFFF] dark:hover:bg-[#6F6F6F] dark:hover:text-[#FFFFFF] flex items-center">
                    <i class="mr-3 fa-solid fa-bolt"></i> Orders
                </a>
                <a href="{{ route('home') }}" 
                    class="block w-full py-2 px-4 rounded text-left bg-[#FFFFFF] text-[#000000] dark:bg-[#000000] dark:text-[#FFFFFF] hover:bg-[#000000] hover:text-[#FFFFFF] dark:hover:bg-[#6F6F6F] dark:hover:text-[#FFFFFF] flex items-center">
                    <i class="mr-3 fa-brands fa-blogger-b"></i> Blogs
                </a>
                <a href="{{ route('home') }}" 
                    class="block w-full py-2 px-4 rounded text-left bg-[#FFFFFF] text-[#000000] dark:bg-[#000000] dark:text-[#FFFFFF] hover:bg-[#000000] hover:text-[#FFFFFF] dark:hover:bg-[#6F6F6F] dark:hover:text-[#FFFFFF] flex items-center">
                    <i class="mr-3 fa-solid fa-headset"></i> Inquiries
                </a>
                <a href="{{ route('home') }}" 
                    class="block w-full py-2 px-4 rounded text-left bg-[#FFFFFF] text-[#000000] dark:bg-[#000000] dark:text-[#FFFFFF] hover:bg-[#000000] hover:text-[#FFFFFF] dark:hover:bg-[#6F6F6F] dark:hover:text-[#FFFFFF] flex items-center">
                    <i class="mr-3 fa-solid fa-user-gear"></i> User Management
                </a>
                <a href="{{ route('home') }}" 
                    class="block w-full py-2 px-4 rounded text-left bg-[#FFFFFF] text-[#000000] dark:bg-[#000000] dark:text-[#FFFFFF] hover:bg-[#000000] hover:text-[#FFFFFF] dark:hover:bg-[#6F6F6F] dark:hover:text-[#FFFFFF] flex items-center">
                    <i class="mr-3 fa-solid fa-angles-left"></i> Go to Website
                </a>
            </nav>
            
            <!-- Logout Button -->
            <div class="p-6">
                <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" class="flex items-center justify-center w-full px-4 py-2 text-black bg-white rounded hover:bg-red-600">
                        <i class="mr-2 fas fa-sign-out-alt"></i> <!-- Icon placed inside the button -->
                        Logout
                    </button>
                </form>
            </div>
        </aside>