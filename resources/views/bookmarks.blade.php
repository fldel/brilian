<x-app-layout>
    <!-- Container scrollable -->
    <div class="relative min-h-screen overflow-y-auto">
        
        <!-- Background Video -->
        <div class="relative h-[450px] flex items-center justify-center">
            <video autoplay muted loop playsinline 
                class="absolute inset-0 object-cover w-full h-full">
                <source src="/videos/bgvidbookmark.mp4" type="video/mp4">
            </video>

            <!-- Overlay hitam transparan -->
            <div class="absolute inset-0 bg-black/60"></div>

            <!-- Judul Tengah -->
            <h1 class="relative z-10 text-[200px] font-cave leading-[0.7] text-center text-white drop-shadow-lg">
                Bookmark
            </h1>

            <!-- Gradient putih di bawah video -->
            <div class="absolute bottom-0 w-full h-16 bg-gradient-to-b from-transparent to-white"></div>
        </div>

        <!-- Konten Halaman -->
        <div class="relative z-10 p-10 text-center bg-white">
            <p class="text-xl text-gray-700">Konten halaman di bawah video.</p>
        </div>
    </div>
</x-app-layout>
