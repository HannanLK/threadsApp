
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Sierra Fashion') }}</title>
    

     <!-- tailwind css -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!--Payment-->
    <script src="https://js.stripe.com/v3/"></script>

    <!--Font link-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inknut+Antiqua:wght@300;400;500;600;700;800;900&family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&family=Poppins:ital,wght@0,100;0,500;0,600;0,800;0,900;1,100;1,400;1,500;1,700;1,800&display=swap"
     rel="stylesheet">

    <!--Icon link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
    
    <!-- Custom Css -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    <!-- AOS Animation Library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />

    <!-- Custom Js -->
    <script src="{{ asset('assets/js/tailwind-custom-config.js') }}"></script>
    
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @livewireStyles
</head>
<body class="flex flex-col min-h-screen text-gray-800 bg-gray-100">
    @include('layouts.header')

    <!-- Main Content -->
    <main >
        {{ $slot }}
    </main>

    <!-- Footer -->
    @include('layouts.footer')
    
    @livewireScripts
</body>
</html>
