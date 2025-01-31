<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Admin-Dashboard</title>

        <!-- Tailwind CSS -->
        <script src="https://cdn.tailwindcss.com"></script>

        <!-- Custom Css -->
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

        <!-- Font Link -->
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;800&display=swap" rel="stylesheet">

        <!-- Icon Link -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="flex flex-col min-h-screen bg-gray-100 font-poppins">

        @include('layouts.sidebar')
   
        {{ $slot }}
            
        <!-- Fixed Footer Section -->
        <footer class="fixed bottom-0 left-0 w-full py-4 text-center text-white bg-[#BFA86D]">
            <p>&copy; 2024 Sierra Fashion. All rights reserved.</p>
        </footer>
        
        <script src="{{ asset('assets/js/canvas.js') }}"></script>
        <script src="{{ asset('assets/js/product.js') }}"></script>
        

        <!-- AOS Script -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
        <script>
            AOS.init();
        </script>
    </body>
</html>
