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

    <!-- Scholarships Section -->
    <div class="relative w-full bg-white py-10 overflow-hidden">
        <h2 class="text-5xl font-cave text-center mb-10">Recommended For You</h2>
        
        <div class="scroll-container relative overflow-hidden">
            <div class="scroll-wrapper flex gap-6">
                @foreach($scholarships as $scholarship)
                    <div class="scholarship-card relative flex-shrink-0 w-[450px] h-[300px] 
                    rounded-2xl overflow-hidden border-4 border-white/40 
                    transition-transform duration-300 ease-in-out hover:scale-105 hover:shadow-2xl">

                    <!-- Gambar Beasiswa -->
                    <img src="{{ asset('storage/' . $scholarship->image) }}" 
                        alt="{{ $scholarship->name }}" 
                        class="w-full h-full object-cover rounded-2xl">

                    <!-- Overlay gradient ke atas -->
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent"></div>

                    <!-- Teks nama scholarship di tengah bawah -->
                    <div class="absolute bottom-0 left-0 w-full flex justify-center items-end pb-6">
                        <p class="text-white text-2xl font-bold text-center drop-shadow-lg">
                            {{ $scholarship->name }}
                        </p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    
    <!-- All Scholarships Section -->
    <div class="relative w-full bg-gray-50 py-16">
        <div class="max-w-7xl mx-auto px-6">
            <h2 class="text-5xl font-cave text-center mb-14 text-gray-900">All Scholarships</h2>

            <!-- Grid container -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                @foreach($scholarships as $scholarship)
                    <div class="bg-white rounded-2xl shadow-md hover:shadow-xl border border-gray-200 overflow-hidden transition-transform duration-300 hover:scale-105">
                        
                        <!-- Gambar -->
                        <img src="{{ asset('storage/' . $scholarship->image) }}" 
                            alt="{{ $scholarship->name }}" 
                            class="w-full h-48 object-cover">

                        <!-- Konten -->
                        <div class="p-5 flex flex-col justify-between h-[250px]">
                            <!-- Nama -->
                            <h3 class="text-xl font-bold text-gray-900 mb-2 leading-tight line-clamp-2">
                                {{ $scholarship->name }}
                            </h3>

                            <!-- Deskripsi -->
                            <p class="text-gray-600 text-sm mb-4 line-clamp-3">
                                {{ Str::limit($scholarship->description, 150, '...') }}
                            </p>

                            <!-- Kategori -->
                            <div class="flex flex-wrap gap-2 mt-auto">
                                @if($scholarship->category)
                                    @foreach(explode(',', $scholarship->category) as $cat)
                                        <span class="px-3 py-1 bg-blue-100 text-blue-700 rounded-full text-sm font-semibold">
                                            {{ trim($cat) }}
                                        </span>
                                    @endforeach
                                @else
                                    <span class="px-3 py-1 bg-gray-200 text-gray-600 rounded-full text-sm">Uncategorized</span>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    @include('layouts.footer')
</x-app-layout>
