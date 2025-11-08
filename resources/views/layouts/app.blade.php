<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="icon" href="{{ asset('img/brilianwhite.png') }}" type="image/png"></link>
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
        
        <title>Brilian</title>

        <style>
        .glass {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(12px) saturate(180%);
            -webkit-backdrop-filter: blur(12px) saturate(180%);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 16px;
        }

        @keyframes scrollInfinite {
            0% {
                transform: translateX(0);
            }
            100% {
                transform: translateX(-50%);
            }
        }

        .scroll-wrapper {
            display: flex;
            width: max-content;
            animation: scrollInfinite 40s linear infinite;
        }

        /* Hover effect: melambat */
            .scroll-container:hover .scroll-wrapper {
            animation-play-state: paused;
        }

        /* Smooth hover transition */
        .scholarship-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .scholarship-card:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        </style>

        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script>
        AOS.init({
            duration: 1200, // durasi animasi
            once: true,     // animasi hanya sekali saat scroll
            offset: 100,    // jarak trigger animasi
        });
        </script>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="relative z-10 min-h-screen">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="shadow">
                    <div class="px-4 py-6 mx-auto text-white max-w-7xl sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
