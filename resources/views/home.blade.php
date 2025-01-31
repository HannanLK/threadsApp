
<x-app-layout>
    
    <!-- Banner Section -->
    <section>
        <div class="relative content-center h-max md:h-auto pt-[60px] md:pt-[80px]">
            <!-- Banner Section -->
            <div class="relative flex items-center justify-center bg-cover bg-center bg-no-repeat w-full h-screen md:h-[500px] pt-10" 
                 style="background-image: url('{{ asset('assets/image/banner.webp') }}');" 
                 data-aos="zoom-in">
                 
                <!-- Dark Overlay -->
                <div class="absolute inset-0 bg-black bg-opacity-50"></div>

                <!-- Floating Logo -->
                <div class="absolute transform -translate-x-1/2 top-8 left-1/2">
                    <img src="{{ asset('assets/image/logo_2.png') }}" class="w-[120px] h-auto md:w-[168px] opacity-25">
                </div>
        
                <!-- Banner Text -->
                <div class="relative flex flex-col items-start justify-center pl-4 md:pl-16 text-left w-full max-w-[400px] md:max-w-none z-10">
                    <p class="text-sm font-medium leading-tight text-white md:text-2xl animate-float" data-aos="fade-up" data-aos-delay="300">
                        NEW TREND<br>
                    </p>
                    <p class="flex items-center text-2xl font-extrabold text-black md:text-7xl animate-float" data-aos="fade-up" data-aos-delay="500">
                        COLLUSION
                    </p>    
                    <div class="mt-4 md:mt-8" data-aos="fade-up" data-aos-delay="500">
                        <button class="inline-block px-4 py-2 text-sm font-semibold text-white transition transform rounded-md shadow-lg hover:bg-gray-700 hover:-translate-y-1 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-opacity-50 md:px-6 md:py-3 md:text-lg bg-[#BFA86D]">
                            SHOP NEW
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>  

    
    <!-- Fashion New Trends Section -->
    <section class="pt-12 category">
        <div class="pb-8 text-center">
            <span class="font-bold text-red-500">LATEST NEWS</span>
            <h2 class="mt-2 text-3xl font-semibold">Fashion New Trends</h2>
        </div>
        <div class="container grid grid-cols-2 gap-4 mx-auto mt-8 md:grid-cols-4">
            <div class="relative overflow-hidden hover-scale group" data-aos="flip-left">
                <img src="{{ asset('assets/image/category1.jpg') }}" alt="Women's Collection" class="object-cover w-full rounded-lg h-72">
                <div class="absolute inset-0 flex flex-col justify-end p-4 transition-opacity duration-300 bg-black bg-opacity-50 opacity-0 group-hover:opacity-100">
                    <h3 class="text-lg font-bold text-white">WOMEN'S</h3>
                    <a href="#" class="text-sm font-normal text-white">VIEW COLLECTION</a>
                </div>
            </div>

            <div class="relative overflow-hidden hover-scale group" data-aos="flip-up" data-aos-delay="300">
                <img src="{{ asset('assets/image/category3.jpg') }}" alt="Men's Collection" class="object-cover w-full rounded-lg h-72">
                <div class="absolute inset-0 flex flex-col justify-end p-4 transition-opacity duration-300 bg-black bg-opacity-50 opacity-0 group-hover:opacity-100">
                    <h3 class="text-lg font-bold text-white">MEN'S</h3>
                    <a href="#" class="text-sm font-normal text-white">VIEW COLLECTION</a>
                </div>
            </div>

            <div class="relative overflow-hidden hover-scale group" data-aos="flip-down" data-aos-delay="600">
                <img src="{{ asset('assets/image/category2.png') }}" alt="Kids' Collection" class="object-cover w-full rounded-lg h-72">
                <div class="absolute inset-0 flex flex-col justify-end p-4 transition-opacity duration-300 bg-black bg-opacity-50 opacity-0 group-hover:opacity-100">
                    <h3 class="text-lg font-bold text-white">KIDS</h3>
                    <a href="#" class="text-sm font-normal text-white">VIEW COLLECTION</a>
                </div>
            </div>
            <div class="relative overflow-hidden hover-scale group" data-aos="flip-right" data-aos-delay="900">
                <img src="{{ asset('assets/image/category4.jpg') }}" alt="Accessories Collection" class="object-cover w-full rounded-lg h-72">
                <div class="absolute inset-0 flex flex-col justify-end p-4 transition-opacity duration-300 bg-black bg-opacity-50 opacity-0 group-hover:opacity-100">
                    <h3 class="text-lg font-bold text-white">ACCESSORIES</h3>
                    <a href="#" class="text-sm font-normal text-white">VIEW COLLECTION</a>
                </div>
            </div>
        </div>
    </section>  
    <!-- Products Section -->
    <section class="py-16 category">
        <div class="pb-8 text-center" data-aos="fade-up">
            <span class="font-bold text-red-500">PRODUCTS</span>
            <h2 class="mt-2 text-3xl font-semibold">Our Best Picks for You</h2>
        </div>
        <div class="flex justify-center pb-3 mb-6 space-x-4 text-center gap-7">
            <h2 id="menTab" class="text-xl font-semibold text-red-500 cursor-pointer sm:text-2xl ">Men's Fashion</h2>
            <h2 id="womenTab" class="text-xl font-semibold text-gray-500 cursor-pointer sm:text-2xl">Women's Fashion</h2>
        </div>
        
    
        <div class="relative">
            <!-- Men Slider -->
            <div id="menSlider" class="grid grid-cols-2 px-4 overflow-hidden gap-x-4 gap-y-8 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 lg:px-8">     
                <div class="relative group" data-aos="zoom-in">
                    <div class="w-full overflow-hidden bg-gray-200 rounded-md aspect-w-1 aspect-h-1 lg:aspect-none lg:h-80">
                        <img src="{{ asset('assets/image/product/men/product1.png') }}" alt="ADIDAS BASKETBALL LONG SLEEVE TEE" class="object-cover object-center w-full h-full lg:h-full lg:w-full">
                    </div>
                    <div class="flex justify-between mt-4 ">
                        <div>
                            <h3 class="text-sm text-gray-700">
                                <a href="#">
                                    <span aria-hidden="true" class="absolute inset-0"></span>
                                    ADIDAS BASKETBALL LONG SLEEVE TEE
                                </a>
                            </h3>
                            <p class="mt-1 text-sm text-gray-500">Rs 5,000.00</p>
                        </div>
                        <button class="mt-10">
                            <i class="fa-solid fa-cart-shopping fa-lg" style="color: #ff0000;"></i>
                        </button>
                    </div>
                </div>
                
                <div class="relative group" data-aos="zoom-in" data-aos-delay="100">
                    <div class="w-full overflow-hidden bg-gray-200 rounded-md aspect-w-1 aspect-h-1 lg:aspect-none lg:h-80">
                        <img src="{{ asset('assets/image/product/men/product2.png') }}" alt="ADIDAS BASKETBALL LONG SLEEVE TEE" class="object-cover object-center w-full h-full lg:h-full lg:w-full">
                    </div>
                    <div class="flex justify-between mt-4">
                        <div>
                            <h3 class="text-sm text-gray-700">
                                <a href="product.html">
                                    <span aria-hidden="true" class="absolute inset-0"></span>
                                    Casual Wear Printed Cuban Collar Shirt
                                </a>
                            </h3>
                            <p class="mt-1 text-sm text-gray-500">Rs 3,000.00</p>
                        </div>
                        <button class="mt-10">
                            <i class="fa-solid fa-cart-shopping fa-lg" style="color: #ff0000;"></i>
                        </button>
                    </div>
                </div>
                
                <div class="relative group" data-aos="zoom-in" data-aos-delay="200">
                    <div class="w-full overflow-hidden bg-gray-200 rounded-md aspect-w-1 aspect-h-1 lg:aspect-none lg:h-80">
                        <img src="{{ asset('assets/image/product/men/product3.png') }}" alt="ADIDAS BASKETBALL LONG SLEEVE TEE" class="object-cover object-center w-full h-full lg:h-full lg:w-full">
                    </div>
                    <div class="flex justify-between mt-4">
                        <div>
                            <h3 class="text-sm text-gray-700">
                                <a href="#">
                                    <span aria-hidden="true" class="absolute inset-0"></span>
                                    C.D. Guadalajara ftblCULTURE Men's Hoodie
                                </a>
                            </h3>
                            <p class="mt-1 text-sm text-gray-500">Rs 5,500.00</p>
                        </div>
                        <button class="mt-10">
                            <i class="fa-solid fa-cart-shopping fa-lg" style="color: #ff0000;"></i>
                        </button>
                    </div>
                </div>
                
                <div class="relative group" data-aos="zoom-in" data-aos-delay="300">
                    <div class="w-full overflow-hidden bg-gray-200 rounded-md aspect-w-1 aspect-h-1 lg:aspect-none lg:h-80">
                        <img src="{{ asset('assets/image/product/men/product4.png') }}" alt="ADIDAS BASKETBALL LONG SLEEVE TEE" class="object-cover object-center w-full h-full lg:h-full lg:w-full">
                    </div>
                    <div class="flex justify-between mt-4">
                        <div>
                            <h3 class="text-sm text-gray-700">
                                <a href="#">
                                    <span aria-hidden="true" class="absolute inset-0"></span>
                                    LEVI'S® SPORTSWEAR LOGO GRAPHIC T-SHIRT
                                </a>
                            </h3>
                            <p class="mt-1 text-sm text-gray-500">Rs 4,000.00</p>
                        </div>
                        <button class="mt-10">
                            <i class="fa-solid fa-cart-shopping fa-lg" style="color: #ff0000;"></i>
                        </button>
                    </div>
                </div>
                <div class="relative group" data-aos="zoom-in" data-aos-delay="400">
                    <div class="w-full overflow-hidden bg-gray-200 rounded-md aspect-w-1 aspect-h-1 lg:aspect-none lg:h-80">
                        <img src="{{ asset('assets/image/product/men/product5.png') }}" alt="ADIDAS BASKETBALL LONG SLEEVE TEE" class="object-cover object-center w-full h-full lg:h-full lg:w-full">
                    </div>
                    <div class="flex justify-between mt-4">
                        <div>
                            <h3 class="text-sm text-gray-700">
                                <a href="#">
                                    <span aria-hidden="true" class="absolute inset-0"></span>
                                    Active Wear Printed Tank Top
                                </a>
                            </h3>
                            <p class="mt-1 text-sm text-gray-500">Rs 2,000.00</p>
                        </div>
                        <button class="mt-10">
                            <i class="fa-solid fa-cart-shopping fa-lg" style="color: #ff0000;"></i>
                        </button>
                    </div>
                </div>
                
            </div>
    
            <!-- Women Slider -->
            <div id="womenSlider" class="hidden grid-cols-2 px-4 overflow-hidden h gap-x-4 gap-y-8 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 lg:px-8 womenslider">
                
                <div class="relative group" data-aos="zoom-in">
                    <div class="w-full overflow-hidden bg-gray-200 rounded-md aspect-w-1 aspect-h-1 lg:aspect-none lg:h-80">
                        <img src="{{ asset('assets/image/product/men/product4.png') }}" alt="ADIDAS BASKETBALL LONG SLEEVE TEE" class="object-cover object-center w-full h-full lg:h-full lg:w-full">
                    </div>
                    <div class="flex justify-between mt-4">
                        <div>
                            <h3 class="text-sm text-gray-700">
                                <a href="#">
                                    <span aria-hidden="true" class="absolute inset-0"></span>
                                    ADIDAS BASKETBALL LONG SLEEVE TEE
                                </a>
                            </h3>
                            <p class="mt-1 text-sm text-gray-500">Rs 5,000.00</p>
                        </div>
                        <button class="mt-10">
                            <i class="fa-solid fa-cart-shopping fa-lg" style="color: #ff0000;"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
            // product slider
            const menTab = document.getElementById('menTab');
            const womenTab = document.getElementById('womenTab');
            const menSlider = document.getElementById('menSlider');
            const womenSlider = document.getElementById('womenSlider');

            const showMenSlider = () => {
                menSlider.classList.remove('hidden');
                womenSlider.classList.add('hidden');
                menTab.classList.add('text-red-500');
                menTab.classList.remove('text-gray-500');
                womenTab.classList.add('text-gray-500');
                womenTab.classList.remove('text-red-500');
            };

            const showWomenSlider = () => {
                womenSlider.classList.remove('hidden');
                menSlider.classList.add('hidden');
                womenTab.classList.add('text-red-500');
                womenTab.classList.remove('text-gray-500');
                menTab.classList.add('text-gray-500');
                menTab.classList.remove('text-red-500');
            };

            menTab.addEventListener('click', showMenSlider);
            womenTab.addEventListener('click', showWomenSlider);
    </script>

    <!-- About Us Section -->
    <section class="category">
        <div class="mb-12 text-center md:px-8 lg:px-16">
            <span class="font-bold text-red-500">What Shop</span>
            <h2 class="mt-1 text-3xl font-semibold">About Us</h2>
        </div>

        <div class="flex flex-col justify-between md:flex-row ">
            <div class="italic leading-relaxed text-gray-700 md:w-1/2 md:pl-8 lg:pl-16">
                <p>
                    Sierra Fashion embarked on its journey in 1987 with a clear vision: to establish a distinguished
                    local designer-wear fashion brand in Sri Lanka. Over the past 35 years, we've proudly emerged as
                    leaders in the retail industry, renowned for our commitment to quality, durability, and sustainability.
                </p>
                <p class="mt-4">
                    Our success stems from the dedication and talent of our in-house team, who meticulously design and
                    manufacture all our materials and creations.
                </p>
                <p class="pt-24 mt-6 text-4xl italic font-semibold text-red-500 animate-pulse">#Sierra_Fashion</p>
            </div>
            <div class="flex justify-end mt-8 md:w-1/2 md:mt-0">
                <img src="{{ asset('assets/image/about3.png') }}" alt="Fashion Image" class="h-[430px]">
            </div>
        </div>
    </section>


    <!-- Partners Section -->
    <section class="pt-12 pb-6 category">
        <div class="flex items-center justify-center mb-6">
            <div class="hidden w-screen h-1 bg-red-500 md:block "></div>
            <h2 class="mx-4 text-2xl font-semibold text-black whitespace-nowrap">Our Partners</h2>
            <div class="hidden w-screen h-1 bg-red-500 md:block"></div>
        </div>
        <div class="flex flex-wrap items-center space-x-6 space-y-4 justify-evenly md:space-y-0 gap-7">
            <img src="{{ asset('assets/image/brand1.png') }}" alt="Adidas" class="h-12 md:h-28 animate-bounce">
            <img src="{{ asset('assets/image/brand2.png') }}" alt="Puma" class="h-12 delay-200 md:h-28 animate-bounce">
            <img src="{{ asset('assets/image/brand4.png') }}" alt="Lacoste" class="h-12 md:h-28 animate-bounce delay-400">
            <img src="{{ asset('assets/image/brand5.png') }}" alt="Levi's" class="h-12 md:h-28 animate-bounce delay-600">
            <img src="{{ asset('assets/image/brand3.png') }}" alt="Nike" class="h-12 md:h-28 animate-bounce delay-800">
            <img src="{{ asset('assets/image/brand6.png') }}" alt="Hugo Boss" class="h-12 delay-1000 md:h-28 animate-bounce">
        </div>
    </section>
    
   

</x-app-layout>