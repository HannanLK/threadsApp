<header class="fixed top-0 left-0 z-40 w-full bg-white shadow-sm bg-gradient-to-l from-primary to-secondary" data-aos="fade-down">
    <div class="flex items-center justify-between px-4 mx-auto sm:px-6 lg:px-8">
        <!-- Logo -->
        <a href="/">
            <img src="{{ asset('assets/image/logo_2.png') }}" alt="Clothing Store Logo" class="w-[140px] cursor-pointer">
        </a>
        
        <!-- Desktop Navigation -->
        <nav class="hidden space-x-6 md:flex">
            <ul class="flex space-x-4">
                <li><a href="/" class="px-2 font-semibold text-gray-700 underline-animation">Home</a></li>
                <li><a href="/men" class="px-2 font-semibold text-gray-700 underline-animation">Men</a></li>
                <li><a href="/women" class="px-2 font-semibold text-gray-700 underline-animation">Women</a></li>
                <li><a href="/kids" class="px-2 font-semibold text-gray-700 underline-animation">Kids</a></li>
                <li><a href="/accessories" class="px-2 font-semibold text-gray-700 underline-animation">Accessories</a></li>
                <li><a href="/contact" class="px-2 font-semibold text-gray-700 underline-animation">Contact Us</a></li>
            </ul>
        </nav>
        
        <!-- Icons and Profile Dropdown -->
        <ul class="hidden space-x-4 md:flex">
            <li>
                <button class="text-black hover:text-red-600">
                    <i class="fa-regular fa-heart fa-lg"></i>
                </button>
            </li>
            <li>
                <button class="text-black hover:text-red-600">
                    <i class="fas fa-shopping-cart fa-lg"></i>
                </button>
            </li>
            <li>
                <div class="relative">
                    <button id="dropdown-button" class="text-black hover:text-red-600 focus:outline-none" aria-expanded="false">
                      <i class="fa-regular fa-circle-user fa-lg"></i>
                    </button>
                    <!-- Dropdown  -->
                    <div id="dropdown-menu" class="absolute right-0 hidden w-48 mt-2 bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5" role="menu" aria-orientation="vertical" aria-labelledby="dropdown-button">
                        @auth
                        <!-- If the user is authenticated, show their name and sign out option -->
                        <span class="block px-4 py-2 font-serif text-lg text-red-500">Hi, {{ Auth::user()->name }}</span>
                        <a href="{{ route('admin.profile.edit') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Profile</a>
                        <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: inline;">
                            @csrf
                            <button class="block w-full px-4 py-2 text-sm text-left text-gray-700 hover:bg-gray-100" type="submit">Logout</button>
                        </form>
                        @else
                            <!-- If the user is not authenticated, show login and guest info -->
                            <span class="block px-4 py-2 font-serif text-lg text-red-500">Hi, Guest</span>
                            <a href="{{ route('admin.login') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Login</a>
                        @endauth
                    </div>
                </div>     
            </li>
        </ul>
        
        <!-- Mobile Menu Button -->
        <button id="mobile-menu-button" class="md:hidden focus:outline-none">
            <i class="fas fa-bars fa-lg"></i>
        </button>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="hidden bg-white md:hidden">
        <nav>
            <ul class="p-4 space-y-4">
                <li><a href="/" class="block text-gray-700 underline-animation">Home</a></li>
                <li><a href="/men" class="block text-gray-700 underline-animation">Men</a></li>
                <li><a href="/women" class="block text-gray-700 underline-animation">Women</a></li>
                <li><a href="/kids" class="block text-gray-700 underline-animation">Kids</a></li>
                <li><a href="/accessories" class="block text-gray-700 underline-animation">Accessories</a></li>
                <li><a href="/contact" class="block text-gray-700 underline-animation">Contact Us</a></li>
            </ul>
        </nav>
    </div>
</header>

 <!-- Add this script for toggling the mobile menu -->
 <script>
    document.addEventListener('DOMContentLoaded', () => {
        const dropdownNav = document.getElementById('dropdown-nav');
        const dropdownMenu = document.getElementById('dropdown-menu1');

        dropdownNav.addEventListener('click', () => {
            const isExpanded = dropdownMenu.classList.contains('hidden');
            dropdownMenu.classList.toggle('hidden', !isExpanded);
        });

        // Close dropdown when clicking outside
        document.addEventListener('click', (event) => {
            if (!dropdownNav.contains(event.target) && !dropdownMenu.contains(event.target)) {
                dropdownMenu.classList.add('hidden');
            }
        });
    });
</script>


    <!-- Layout -->
    <div class="flex flex-1 pt-24">
        <!-- Sidebar -->
        <aside class="fixed top-16 left-0 flex flex-col justify-between w-64 h-[calc(100vh-7rem)] bg-white shadow pt-10">
            <!-- Navigation Links -->
            <nav class="p-6 space-y-4">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center text-gray-600 hover:text-green-600">
                    <i class="mr-3 fas fa-home"></i> Dashboard
                </a>
                <a href="{{ route('admin.viewproduct') }}" class="flex items-center text-gray-600 hover:text-green-600">
                    <i class="mr-3 fas fa-shopping-cart"></i> View Products
                </a>
                <a href="ViewAdmin" class="flex items-center text-gray-600 hover:text-green-600">
                    <i class="mr-3 fa-solid fa-clipboard"></i> Orders
                </a>
            </nav>

            <!-- Logout Button -->
            <div class="p-6">
                <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" class="flex items-center justify-center w-full px-4 py-2 text-white bg-red-500 rounded hover:bg-red-600">
                        <i class="mr-2 fas fa-sign-out-alt"></i> <!-- Icon placed inside the button -->
                        Logout
                    </button>
                </form>
            </div>
        </aside>