<x-app-layout>
<div class="relative min-h-screen overflow-y-auto">

    <div class="relative h-[450px] flex items-center justify-center">
        <video autoplay muted loop playsinline class="absolute inset-0 object-cover w-full h-full">
            <source src="/videos/bgvidbookmark.mp4" type="video/mp4">
        </video>
        <div class="absolute inset-0 bg-black/60"></div>
        <h1 class="relative z-10 text-[200px] font-cave leading-[0.7] text-center text-white drop-shadow-lg">
            Bookmark
        </h1>
        <div class="absolute bottom-0 w-full h-16 bg-gradient-to-b from-transparent to-white"></div>
    </div>

    <div class="relative z-10 bg-white p-10">
        @if($bookmarks->isEmpty())
            <p class="text-center text-2xl text-gray-600 mt-10">Belum ada beasiswa yang disimpan.</p>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-10">
                @foreach($bookmarks as $bookmark)
                    <div class="bg-white rounded-2xl shadow-lg border hover:shadow-2xl transition-transform hover:scale-105 overflow-hidden">
                        <img src="{{ asset('storage/' . $bookmark->scholarship->image) }}" class="w-full h-[240px] object-cover">
                        <div class="p-6">
                            <h3 class="text-2xl font-bold mb-3">{{ $bookmark->scholarship->name }}</h3>
                            <p class="text-gray-600 mb-5 line-clamp-3">{{ Str::limit($bookmark->scholarship->description, 150) }}</p>
                            <x-pixel-button href="{{ $bookmark->scholarship->link }}" target="_blank"
                               class="inline-block bg-blue-600 text-white px-4 py-2 rounded-full hover:bg-blue-700 transition">
                                Apply Now
                            </x-pixel-button>
                            <form 
                                action="{{ route('bookmark.toggle', $bookmark->scholarship_id) }}" 
                                method="POST" 
                                class="inline"
                                onsubmit="return confirm('Hapus dari bookmark?')"
                            >
                                @csrf
                                <x-pixel-button  
                                    mainColor="#D30000"  
                                    hoverColor="#B80000"  
                                    shadowColor="#7C0A02"  
                                    borderColor="#5A0000"
                                    type="submit"  
                                    class="text-white ml-3">
                                    Hapus
                                </x-pixel-button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>
</x-app-layout>
