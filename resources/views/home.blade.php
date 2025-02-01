
<x-app-layout>
    <!-- Banner Section -->
    <section>
    <!-- Sliding Banner Section -->
    <header class="relative overflow-hidden w-full h-80 slider">
        <div class="slides flex transition-transform duration-500 ease-in-out">
            <!-- Slide 1 -->
            <div class="min-w-full relative slide">
                <img src="{{ asset('assets\image\banner\banner1.png') }}" alt="Banner 1" class="w-full h-full object-cover">
                <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-center text-white">
                    <h2 class="text-5xl font-light text-white mb-6">Exclusive Men's Wear</h2>
                    <a href="{{ route('shop.men') }}" class="bg-sky-900 text-white px-4 py-2 rounded-sm">Shop Mens</a>
                </div>
            </div>
            <!-- Slide 2 -->
            <div class="min-w-full relative slide">
                <img src="{{ asset('assets\image\banner\banner2.png') }}" alt="Banner 2" class="w-full h-full object-cover">
                <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-center">
                    <h2 class="text-5xl font-light mb-6 text-pink-800">Exclusive Women's Wear</h2>
                    <a href="{{ route('shop.women') }}" class="bg-pink-500 text-white px-4 py-2 rounded-sm mb-2">Shop Women's</a>
                </div>
            </div>
            <!-- Slide 3 -->
            <div class="min-w-full relative slide">
                <img src="{{ asset('assets\image\banner\banner3.png') }}" alt="Banner 3" class="w-full h-full object-cover">
                <div class="absolute top-1/2 left-2/3 transform -translate-x-1/2 -translate-y-1/2">
                    <h2 class="text-5xl font-light mb-6 text-white">Exclusive Accessories</h2>
                    <a href="{{ route('shop.accessory') }}" class="bg-emerald-800 text-white px-4 py-2 rounded-sm">Shop Accessories</a>
                </div>
            </div>
        </div>
        <div class="absolute inset-y-1/2 flex justify-between w-full items-center">
            <button id="prev-slide" class="bg-black bg-opacity-50 text-white p-3 rounded-md">&lt;</button>
            <button id="next-slide" class="bg-black bg-opacity-50 text-white p-3 rounded-md">&gt;</button>
        </div>
    </header>    
</section>  

    
    <!-- Fashion New Trends Section -->
    <section class="pt-12 category">
        <div class="pb-8 text-center">
            <h2 class="text-3xl mb-3 text-center mt-2">NEW ARRIVALS</h2>
            <hr class=" w-10 border-t-2 border-blue-950 mx-auto mb-2">
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
            <h2 class="mt-2 text-3xl font-semibold">Featured Products</h2>
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

            // Slider Functionality
            let currentIndex = 0;
            const slides = document.querySelectorAll('.slide');
            const totalSlides = slides.length;

            function showSlide(index) {
                const offset = -index * 100;
                document.querySelector('.slides').style.transform = `translateX(${offset}%)`;
            }

            document.getElementById('next-slide').addEventListener('click', function() {
                currentIndex = (currentIndex + 1) % totalSlides;
                showSlide(currentIndex);
            });

            document.getElementById('prev-slide').addEventListener('click', function() {
                currentIndex = (currentIndex - 1 + totalSlides) % totalSlides;
                showSlide(currentIndex);
            });

            setInterval(function() {
                currentIndex = (currentIndex + 1) % totalSlides;
                showSlide(currentIndex);
            }, 5000);
    </script>

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