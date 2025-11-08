<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ asset('img/brilianwhite.png') }}" type="image/png">
    <title>Brilian</title>
    @vite('resources/css/app.css')

    <!-- AOS Animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
        html, body {
            overflow-x: hidden; /* cegah scroll horizontal */
        }

        /* Fullscreen video background */
        .video-bg {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: -1;
        }

        /* Glass effect footer */
        .glass {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(12px) saturate(180%);
            -webkit-backdrop-filter: blur(12px) saturate(180%);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 16px;
        }

        /* Noise Overlay */
        .noise-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url("https://grainy-gradients.vercel.app/noise.svg");
            opacity: 0.40;
            mix-blend-mode: overlay;
            pointer-events: none;
            z-index: 0;
        }

        /* Black Overlay */
        .black-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 0;
        }

        /* Gradient transition ke putih */
        .gradient-transition {
            height: 100px;
            background: linear-gradient(to bottom, transparent, white);
        }   
    </style>
</head>
<body class="flex flex-col min-h-screen text-gray-900">

    <!-- Video Background -->
    <video autoplay muted loop playsinline class="video-bg">
        <source src="{{ asset('videos/bgvid.mp4') }}" type="video/mp4">
    </video>

    <!-- Black Overlay -->
    <div class="black-overlay"></div>
    
    <!-- Header -->
    <header class="relative z-10 flex items-center justify-between px-6 sm:px-8 py-4" data-aos="fade-down">
        <div class="flex items-center space-x-2">
            <x-application-logo></x-application-logo>
            <p class="text-white font-cave text-2xl sm:text-[30px]">BRILIAN</p>
        </div>

        <div class="space-x-2 sm:space-x-3">
            @if (Route::has('login'))
                @auth
                    <x-pixel-button maincolor="#B8860B" shadowcolor="#B8860B" class="text-white"
                        onclick="window.location.href='{{ url('/dashboard') }}'">
                        Dashboard
                    </x-pixel-button>
                @else
                    <x-pixel-button maincolor="#FFD82C" shadowcolor="#B8860B" class="text-white"
                        onclick="window.location.href='{{ route('login') }}'">
                        Login
                    </x-pixel-button>

                    @if (Route::has('register'))
                        <x-pixel-button maincolor="#4CAF50" shadowcolor="#2E7D32" class="text-white"
                            onclick="window.location.href='{{ route('register') }}'">
                            Register
                        </x-pixel-button>
                    @endif
                @endauth
            @endif
        </div>
    </header>

    <!-- Hero Section -->
    <main class="relative z-10 flex flex-col items-center justify-center px-4 text-center pt-24 pb-32">
        <p class="text-xl sm:text-2xl md:text-[32px] font-cave text-white/70 mb-2">START YOUR</p>
        
        <h1 class="leading-[0.9] text-white tracking-wider font-cave 
                   text-[60px] sm:text-[120px] md:text-[160px] lg:text-[200px] drop-shadow">
            Scholarship <br> Adventure
        </h1> 
        
        <p class="hidden sm:block text-lg sm:text-[24px] md:text-[30px] font-cave text-white/70 mt-4">
            Find your way easier, find your dream scholarship
        </p>
    </main>

    <!-- Footer -->
    <footer class="relative flex justify-center w-full pb-6 z-10 mb-10 mt-14">
        <div class="flex items-center justify-between w-[90%] max-w-4xl px-6 py-4 text-sm font-medium text-white glass">
            <span>@2025 – All rights reserved</span>
            <span>created by fidelina affectine sweat</span>
        </div>
    </footer>

    <!-- Gradient ke konten -->
    <div class="relative w-full gradient-transition"></div>

    <!-- Section 1 -->
    <section class="relative w-full bg-white py-20 px-6 text-center">
        <h2 class="leading-[0.9] text-[28px] sm:text-[40px] md:text-[50px] font-cave mb-4" data-aos="fade-up">
            Journey through the world of education
        </h2>
        
        <p class="text-lg sm:text-[24px] md:text-[30px] font-cave text-gray-500 mb-10 mx-auto max-w-3xl" 
           data-aos="fade-up" data-aos-delay="200">
            Look for your future education with simple, fun, cost-friendly education and organizer.
        </p>
        
        <div class="flex justify-center" data-aos="zoom-in" data-aos-delay="400">
            <img src="{{ asset('img/scholarship.jpg') }}" 
                class="rounded-lg shadow-lg w-full max-w-6xl h-auto object-cover border-2 border-black">
        </div>
    </section>

    <!-- Section video grid -->
    <section class="relative w-full bg-white py-10">
        <div class="max-w-2xl mx-auto grid grid-cols-2 md:grid-cols-4 gap-6" data-aos="fade-up" data-aos-delay="200">
            @for ($i=0; $i<4; $i++)
            <div class="flex flex-col items-center">
                <video autoplay muted loop playsinline class="w-[100px] h-[100px] object-cover">
                    <source src="{{ asset('videos/duck.mp4') }}" type="video/mp4">
                </video>
            </div>
            @endfor
        </div>
    </section>

    <!-- Find Your Scholarship -->
    <section class="relative w-full bg-white py-20 px-6">
        <div class="max-w-6xl mx-auto flex flex-col md:flex-row items-center gap-10 md:gap-20" data-aos="fade-right">
            <div class="flex-shrink-0 w-full md:w-1/2">
                <video autoplay muted loop playsinline 
                       class="rounded-lg shadow-lg w-full h-auto object-cover border-2 border-black">
                    <source src="{{ asset('videos/gif1.mp4') }}" type="video/mp4">
                </video>                 
            </div>
            <div class="w-full md:w-1/2 text-center md:text-left">
                <h3 class="text-[32px] sm:text-[40px] md:text-[50px] font-cave mb-4">Find Your Scholarship</h3>
                <p class="text-lg sm:text-[24px] md:text-[30px] font-cave text-gray-500 max-w-md mx-auto md:mx-0">
                    Find easily scholarship that used to confused you, but 
                    now you can easily just find them here.
                </p>
            </div>
        </div>
    </section>

    <!-- Look at the Details -->
    <section class="relative w-full bg-white py-20 px-6">
        <div class="max-w-6xl mx-auto flex flex-col md:flex-row items-center gap-10 md:gap-20" data-aos="fade-left">
            <div class="w-full md:w-1/2 text-center md:text-left">
                <h3 class="text-[32px] sm:text-[40px] md:text-[50px] font-cave mb-4">Look at the Details</h3>
                <p class="text-lg sm:text-[24px] md:text-[30px] font-cave text-gray-500 max-w-md mx-auto md:mx-0">
                    After you found the right scholarship for you,
                    you can look at the details of the scholarship
                    to make sure it's the right one.
                </p>
            </div>
            <div class="flex-shrink-0 w-full md:w-1/2">
                <video autoplay muted loop playsinline 
                       class="rounded-lg shadow-lg w-full h-auto object-cover border-2 border-black">
                    <source src="{{ asset('videos/gif2.mp4') }}" type="video/mp4">
                </video>                 
            </div>
        </div>
    </section>

    <!-- Apply the Scholarship -->
    <section class="relative w-full bg-white py-20 px-6">
        <div class="max-w-6xl mx-auto flex flex-col md:flex-row items-center gap-10 md:gap-20" data-aos="fade-right">
            <div class="flex-shrink-0 w-full md:w-1/2">
                <video autoplay muted loop playsinline 
                       class="rounded-lg shadow-lg w-full h-auto object-cover border-2 border-black">
                    <source src="{{ asset('videos/gif3.mp4') }}" type="video/mp4">
                </video>                 
            </div>
            <div class="w-full md:w-1/2 text-center md:text-left">
                <h3 class="text-[32px] sm:text-[40px] md:text-[50px] font-cave mb-4">Apply the Scholarship!</h3>
                <p class="text-lg sm:text-[24px] md:text-[30px] font-cave text-gray-500 max-w-md mx-auto md:mx-0">
                    After you look at the details and you think it's the right one,
                    you can apply directly to the scholarship provider. Congratulations! 
                </p>
            </div>
        </div>
    </section>

    <!-- Fun Section dengan BG Video -->
    <section class="relative w-full h-[600px] flex flex-col items-center justify-center text-center text-white overflow-hidden">
        <!-- Background video -->
        <video autoplay muted loop playsinline class="absolute inset-0 w-full h-full object-cover">
            <source src="{{ asset('videos/footer.mp4') }}" type="video/mp4">
        </video>

        <!-- Overlay hitam biar teks jelas -->
        <div class="absolute inset-0 bg-black/50"></div>

        <!-- Gradient putih dari atas -->
        <div class="absolute top-0 left-0 w-full h-[100px] bg-gradient-to-b from-white to-transparent"></div>

        <!-- Konten -->
        <div class="relative z-10 flex flex-col items-center space-y-10">
            <!-- 3 koin + teks -->
            <div class="flex flex-wrap justify-center gap-10">
                <div class="flex items-center space-x-3">
                    <img src="{{ asset('img/coin.gif') }}" class="w-[50px] h-[50px]">
                    <span class="text-[20px] sm:text-[24px] font-cave">#Cool Web</span>
                </div>
                <div class="flex items-center space-x-3">
                    <img src="{{ asset('img/coin.gif') }}" class="w-[50px] h-[50px]">
                    <span class="text-[20px] sm:text-[24px] font-cave">#Freshie</span>
                </div>
                <div class="flex items-center space-x-3">
                    <img src="{{ asset('img/coin.gif') }}" class="w-[50px] h-[50px]">
                    <span class="text-[20px] sm:text-[24px] font-cave">#Free</span>
                </div>
            </div>

            <!-- Teks besar -->
            <h2 class="text-[40px] sm:text-[60px] md:text-[80px] lg:text-[100px] font-cave drop-shadow-lg">
                <span id="typed-text"></span>
            </h2>
        </div>
    </section>
    
    @include('layouts.footer')

    <!-- Script -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
    <script>
      AOS.init({
        duration: 1200,
        once: true
      });

      document.addEventListener("DOMContentLoaded", function () {
        new Typed("#typed-text", {
          strings: [
            "Ready to have some fun?",
            "Ready to find your future?"
          ],
          typeSpeed: 70,
          backSpeed: 50,
          backDelay: 2000,
          startDelay: 500,
          loop: true
        });
      });
    </script>

</body>
</html>
