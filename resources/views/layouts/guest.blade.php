<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Brilian') }}</title>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
        </style>
    </head>
<body class="font-sans antialiased text-brand-default">

    <div class="flex items-center justify-center min-h-screen bg-gray-100">
        <div class="border-2 border-black/30 w-full max-w-4xl min-h-[550px] bg-white rounded-2xl shadow-lg overflow-hidden grid grid-cols-1 md:grid-cols-2">
            
            <!-- LEFT SECTION -->
            <div class="relative flex flex-col justify-between p-6 overflow-hidden text-white font-cave">

                <!-- Background Video -->
                <video autoplay muted loop playsinline 
                    class="absolute inset-0 object-cover w-full h-full">
                    <source src="/videos/bgloginuser.mp4" type="video/mp4">
                </video>

                <!-- Overlay -->
                <div class="absolute inset-0 bg-black/50"></div>

                <!-- Konten -->
                <div class="relative z-10">
                    <p class="text-[30px]">You can easily</p>
                    <h2 class="leading-[0.7] mt-2 text-[60px]">
                        Find your future<br>education here
                    </h2>
                </div>

                <div class="relative z-10 flex items-center justify-center">
                    <x-application-logo></x-application-logo>
                    <p class="text-[30px]">BRILIAN</p>
                </div>
            </div>

            <!-- RIGHT SECTION -->
            <div class="flex flex-col items-center justify-center p-8">
                <div class="p-8">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </div>
</body>

</html>
