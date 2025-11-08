<x-app-layout>
    <!-- Container scrollable -->
    <div class="relative min-h-screen overflow-y-auto">
        
        <!-- Background Video -->
        <div class="fixed inset-0 -z-10">
            <video autoplay muted loop playsinline 
                class="absolute inset-0 object-cover w-full h-full">
                <source src="/videos/bgvidhome.mp4" type="video/mp4">
            </video>
            <!-- Overlay hitam transparan -->
            <div class="absolute inset-0 bg-black/60"></div>
        </div>

        <!-- Konten Halaman -->
        <div class="relative flex flex-col items-center justify-center min-h-screen">
            <!-- Judul Tengah -->
            <h1 class="mt-30 text-[250px] text-white drop-shadow-lg font-cave leading-[0.7] text-center">
                All in One <br>
                Scholarship
            </h1>

            <!-- Search Bar Responsive -->
            <div class="z-10 flex justify-center w-full px-4 mt-24">
                <div class="flex flex-col w-full max-w-6xl gap-3 font-cave sm:flex-row sm:gap-4">
                    
                    <!-- Input Search -->
                    <input type="text" placeholder="Search something.." 
                        class="flex-1 min-w-0 h-[54px] px-4 sm:px-6 text-gray-800 rounded-full 
                               bg-white/80 backdrop-blur-md focus:outline-none focus:ring-2 focus:ring-black
                               text-[30px]" />

                    <!-- Dropdown -->
                    <select class="w-full sm:w-[160px] md:w-[200px] lg:w-[240px] xl:w-[280px] h-[54px] px-4 
                                   text-gray-800 rounded-full bg-white/80 backdrop-blur-md 
                                   focus:outline-none focus:ring-2 focus:ring-black
                                   text-[30px]">
                        <option>Category</option>
                        <option>Tips</option>
                        <option>Bookmark</option>
                    </select>

                    <!-- Search Button -->
                    <button class="border-brand-dark border-2 h-[50px] w-full sm:w-[54px] flex items-center justify-center text-white 
                                   transition bg-blue-600 rounded-full hover:bg-blue-700">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" 
                            fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path
                                d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 
                                3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 
                                6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

    <!-- Gradient Putih di atas konten -->
<div class="relative z-10  w-full h-20 bg-gradient-to-t from-white to-transparent"></div>
    
        <!-- Area kosong diisi putih -->
        <div class="w-full h-2 bg-white"></div>
        <!-- Section berikutnya (biar bisa scroll) -->

    </div>
</x-app-layout>
