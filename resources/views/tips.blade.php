<x-app-layout>
    <div class="relative min-h-screen overflow-y-auto">

        <!-- Background Video -->
        <div class="relative h-[450px] flex items-center justify-center">
            <video autoplay muted loop playsinline 
                class="absolute inset-0 object-cover w-full h-full">
                <source src="/videos/bgvidtips.mp4" type="video/mp4">
            </video>

            <div class="absolute inset-0 bg-black/60"></div>

            <h1 class="relative z-10 text-[100px] md:text-[150px] lg:text-[200px] font-cave leading-[0.7] text-center text-white drop-shadow-lg">
                Tips For You
            </h1>

            <div class="absolute bottom-0 w-full h-16 bg-gradient-to-b from-transparent to-white"></div>
        </div>

        <!-- Konten Tips -->
        <div class="relative z-10 px-6 py-16 bg-white">

            @if($tips->count() > 0)
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 max-w-7xl mx-auto">
                    @foreach($tips as $tip)
                        <div 
                            @if($tip->link) 
                                onclick="window.open('{{ $tip->link }}', '_blank')" 
                                class="bg-gray-50 rounded-2xl shadow-md overflow-hidden transform transition-all duration-300 hover:scale-[1.05] hover:shadow-2xl cursor-pointer"
                            @else
                                class="bg-gray-50 rounded-2xl shadow-md overflow-hidden transform transition-all duration-300 hover:shadow-2xl"
                            @endif
                        >
                            <!-- Gambar -->
                            @if($tip->image)
                                <img src="{{ asset('storage/' . $tip->image) }}" 
                                     alt="{{ $tip->title }}" 
                                     class="w-full h-48 object-cover transition-transform duration-300 hover:scale-110">
                            @else
                                <div class="w-full h-48 bg-gray-200 flex items-center justify-center text-gray-400 italic">
                                    No Image
                                </div>
                            @endif

                            <!-- Isi -->
                            <div class="p-5 text-left">
                                <h3 class="text-4xl font-cave  text-gray-800 mb-2">
                                    {{ $tip->title }}
                                </h3>
                                <p class="text-gray-600 text-sm leading-relaxed">
                                    {{ Str::limit($tip->content, 100) }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-center text-gray-500 text-lg mt-10">No tips available yet.</p>
            @endif
        </div>
    </div>
</x-app-layout>
