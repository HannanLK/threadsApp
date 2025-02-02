<footer class="py-10 mt-auto bg-black">
    <div class="container grid gap-6 px-4 mx-auto sm:px-6 lg:px-8 md:grid-cols-2 lg:grid-cols-3 lg:gap-8">
        <!-- Left Section: Store Info and Logo -->
        <div class="flex flex-col text-gray-400 md:text-left">
            <a href="/">
                <img src="{{ asset('assets/image/banner/logo3.png') }}" alt="Glitz Logo" class="w-40 mb-3">
            </a>
            <p class="mb-4 tracking-widest text-white">Where style meets elegance.</p>
            <p>388, Union Place, Colombo 02<br> 0768535555</p>
            <p>HannanMunas76@gmail.com</p>
        </div>

        <!-- Quick Links -->
        <div class="md:text-left">
            <h3 class="mb-4 text-lg text-white">QUICKLINKS</h3>
            <ul class="space-y-2">
                <li><a href="{{ route('shop.men') }}" class="text-sm text-gray-400 hover:text-white">Mens Clothing</a></li>
                <li><a href="{{ route('shop.women') }}" class="text-sm text-gray-400 hover:text-white">Womens Clothing</a></li>
                <li><a href="{{ route('shop.accessory') }}" class="text-sm text-gray-400 hover:text-white">Accessories</a></li>
                <li><a href="{{ route('contact') }}" class="text-sm text-gray-400 hover:text-white">Contact</a></li>
            </ul>
        </div>

        <!-- Newsletter -->
        <div class="md:text-left">
            <h3 class="mb-4 text-lg text-white">NEWSLETTER</h3>
            <p class="mb-4 text-sm text-gray-400">Signup to our Newsletter For Latest Trends!</p>
            <form action="#" method="POST" class="flex flex-col space-y-2 sm:flex-row sm:space-y-0 sm:space-x-2">
                <input type="email" name="email" placeholder="Your Email" class="flex-1 px-4 py-2 text-sm text-white bg-transparent border border-gray-400 rounded-md focus:outline-none">
                <button type="submit" class="px-4 py-2 bg-gray-700 rounded-md hover:bg-gray-600">
                    <i class="fa-regular fa-envelope fa-lg text-white"></i>
                </button>
            </form>
            <div class="flex mt-4 space-x-4">
                <a href="https://x.com/HannanMunas">
                    <img src="{{ asset('assets/image/banner/x.png') }}" alt="Twitter" class="h-6">
                </a>
                <a href="https://www.instagram.com/hannan.lk/">
                    <img src="{{ asset('assets/image/banner/instagram.png') }}" alt="Instagram" class="h-6">
                </a>
                <a href="https://www.linkedin.com/in/hannanlk/">
                    <img src="{{ asset('assets/image/banner/linkedin.png') }}" alt="LinkedIn" class="h-6">
                </a>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/js/canvas.js') }}"></script>
    <script src="{{ asset('assets/js/Product.js') }}"></script>

    <!-- AOS Script -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script>
        AOS.init();
    </script>
</footer>
