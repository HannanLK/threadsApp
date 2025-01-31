 
    <header class="fixed top-0 left-0 z-40 w-full bg-white shadow-sm bg-gradient-to-l from-primary to-secondary" data-aos="fade-down">
        <div class="flex items-center justify-between px-4 mx-auto sm:px-6 lg:px-8">
            <!-- Logo -->
            <a href="/">
                <img src="{{asset('assets/image/logo_2.png')}}" alt="logo" class="w-[140px] ">
            </a>
            
            <!-- Desktop Navigation -->
            <nav class="hidden space-x-6 md:flex">
                <ul class="flex space-x-4">
                    <li class="inline-block px-3 list-none"><a href="/" class="px-2 underline-animation">Home</a></li>
                    <li class="inline-block px-3 list-none"><a href="{{ route('shop.men') }}" class="px-2 underline-animation">Men</a></li>
                    <li class="inline-block px-3 list-none"><a href="{{ route('shop.women') }}" class="px-2 underline-animation">Women</a></li>
                    <li class="inline-block px-3 list-none"><a href="#" class="px-2 underline-animation">Kids</a></li>
                    <li class="inline-block px-3 list-none"><a href="#" class="px-2 underline-animation">Accessories</a></li>
                    <li class="inline-block px-3 list-none"><a href="#" class="px-2 underline-animation">Contact Us</a></li>
                </ul>
            </nav>
            
            <!-- Icons and Dropdown -->
            <ul class="hidden space-x-4 md:flex">
                <li>
                    <button class="text-black hover:text-red-600">
                        <i class="fa-regular fa-heart fa-lg"></i>
                    </button>
                </li>
                <li>
                    <a href="{{ route('product.cart') }}" class="text-black hover:text-red-600">
                        <i class="fas fa-shopping-cart fa-lg"></i>
                    </a>
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
                                <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Profile</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: inline;">
                                    @csrf
                                    <button class="block w-full px-4 py-2 text-sm text-left text-gray-700 hover:bg-gray-100" type="submit">Logout</button>
                                </form>
                            @else
                                <!-- If the user is not authenticated, show login and guest info -->
                                <span class="block px-4 py-2 font-serif text-lg text-red-500">Hi, Guest</span>
                                <a href="{{ route('login') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Login</a>
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
                    <li><a href="/" class="block underline-animation">Home</a></li>
                    <li><a href="{{ route('shop.men') }}" class="block underline-animation">Men</a></li>
                    <li><a href="#" class="block underline-animation">Women</a></li>
                    <li><a href="#" class="block underline-animation">Kids</a></li> 
                    <li><a href="#" class="block underline-animation">Accessories</a></li> 
                    <li><a href="#" class="block underline-animation">Contact Us</a></li> 
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

    


