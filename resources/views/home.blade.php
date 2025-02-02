
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

    <!-- New Arrivals Section -->
    <section class="pt-12 category">
        <div class="pb-8 text-center">
            <h2 class="text-3xl mb-3 text-center mt-2">NEW ARRIVALS</h2>
            <hr class=" w-10 border-t-2 border-blue-950 mx-auto mb-2">
        </div>
        <div class="grid grid-cols-2 px-4 overflow-hidden gap-x-4 gap-y-8 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 lg:px-8">
            @foreach($newArrivals as $product)
                <div class="relative group" data-aos="zoom-in">
                    <div class="w-full overflow-hidden bg-gray-200 rounded-md aspect-w-1 aspect-h-1 lg:aspect-none lg:h-80">
                        <!-- Use the correct path for images in storage -->
                        <img src="{{ asset('storage/products/' . $product->image) }}" alt="{{ $product->name }}" class="object-cover object-center w-full h-full lg:h-full lg:w-full">
                    </div>
                    <div class="flex justify-between mt-4">
                        <div>
                            <h3 class="text-sm text-gray-700">
                                <a href="#">
                                    <span aria-hidden="true" class="absolute inset-0"></span>
                                    {{ $product->name }}
                                </a>
                            </h3>
                            <p class="mt-1 text-sm text-gray-500">Rs {{ number_format($product->price, 2) }}</p>
                        </div>
                        <button class="mt-10">
                            <i class="fa-solid fa-cart-shopping fa-lg" style="color: #ff0000;"></i>
                        </button>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <!-- Featured Products -->
    <section class="py-16 category">
        <div class="pb-8 text-center" data-aos="fade-up">
            <h2 class="text-3xl mb-3 text-center mt-2">Featured Products</h2>
            <hr class="w-10 border-t-2 border-blue-950 mx-auto mb-2">
        </div>

        <div class="relative">
            <!-- Product Slider -->
            <div class="grid grid-cols-2 px-4 overflow-hidden gap-x-4 gap-y-8 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 lg:px-8">
                @foreach($featuredProducts as $product)
                    <div class="relative group" data-aos="zoom-in">
                        <div class="w-full overflow-hidden bg-gray-200 rounded-md aspect-w-1 aspect-h-1 lg:aspect-none lg:h-80">
                            <!-- Use the correct path for images in storage -->
                            <img src="{{ asset('storage/products/' . $product->image) }}" alt="{{ $product->name }}" class="object-cover object-center w-full h-full lg:h-full lg:w-full">
                        </div>
                        <div class="flex justify-between mt-4">
                            <div>
                                <h3 class="text-sm text-gray-700">
                                    <a href="#">
                                        <span aria-hidden="true" class="absolute inset-0"></span>
                                        {{ $product->name }}
                                    </a>
                                </h3>
                                <p class="mt-1 text-sm text-gray-500">Rs {{ number_format($product->price, 2) }}</p>
                            </div>
                            <button class="mt-10">
                                <i class="fa-solid fa-cart-shopping fa-lg" style="color: #ff0000;"></i>
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Notification When Adding a Product --}}

    <script>
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

</x-app-layout>