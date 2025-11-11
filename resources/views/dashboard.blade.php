<x-app-layout>
<div x-data="{ selectedScholarship: null }" class="relative min-h-screen overflow-y-auto">

    <!-- Background Video -->
    <div class="fixed inset-0 -z-10">
        <video autoplay muted loop playsinline class="absolute inset-0 object-cover w-full h-full">
            <source src="/videos/bgvidhome.mp4" type="video/mp4">
        </video>
        <div class="absolute inset-0 bg-black/60"></div>
    </div>

    <!-- Header -->
    <div class="relative flex flex-col items-center justify-center min-h-screen">
        <h1 class="mt-30 text-[250px] text-white drop-shadow-lg font-cave leading-[0.7] text-center">
            All in One <br> Scholarship
        </h1>

        <!-- Search bar -->
        <div class="z-10 flex justify-center w-full px-4 mt-24">
            <div class="flex flex-col w-full max-w-6xl gap-3 font-cave sm:flex-row sm:gap-4">
                <input type="text" placeholder="Search something.." 
                    class="flex-1 min-w-0 h-[54px] px-4 sm:px-6 text-gray-800 rounded-full 
                           bg-white/80 backdrop-blur-md focus:outline-none focus:ring-2 focus:ring-black text-[30px]" />

                <select class="w-full sm:w-[160px] md:w-[200px] lg:w-[240px] xl:w-[280px] h-[54px] px-4 
                               text-gray-800 rounded-full bg-white/80 backdrop-blur-md 
                               focus:outline-none focus:ring-2 focus:ring-black text-[30px]">
                    <option>Category</option>
                    <option>Tips</option>
                    <option>Bookmark</option>
                </select>

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

    <div class="relative z-10 w-full h-20 bg-gradient-to-t from-white to-transparent"></div>
    <div class="w-full h-2 bg-white"></div>

    <!-- ================= Recommended Section ================= -->
    <div class="relative w-full bg-white py-10 overflow-hidden">
        <h2 class="text-5xl font-cave text-center mb-10">Recommended For You</h2>

        <div class="scroll-container relative overflow-hidden">
            <div class="scroll-wrapper flex gap-6">
                @foreach($scholarships as $scholarship)
                    <div 
                        class="relative flex-shrink-0 w-[450px] h-[300px] rounded-2xl overflow-hidden border-4 border-white/40 
                            transition-transform duration-300 ease-in-out hover:scale-105 hover:shadow-2xl cursor-pointer"
                        @click="selectedScholarship = {{ json_encode($scholarship) }}">
                        
                        <img src="{{ asset('storage/' . $scholarship->image) }}" 
                             alt="{{ $scholarship->name }}" 
                             class="w-full h-full object-cover rounded-2xl">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent"></div>
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

    <!-- ================= All Scholarships Section ================= -->
    <div class="relative w-full bg-gray-50 py-20">
        <div class="max-w-[1700px] mx-auto px-20">
            <h2 class="text-5xl font-cave text-center mb-16 text-gray-900">All Scholarships</h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-x-16 gap-y-12 justify-items-center">
                @foreach($scholarships as $scholarship)
                    <div 
                        class="bg-white rounded-2xl shadow-lg hover:shadow-2xl border border-gray-200 overflow-hidden 
                            transition-transform duration-300 hover:scale-105 w-[370px] h-[520px] cursor-pointer"
                        @click="selectedScholarship = {{ json_encode($scholarship) }}">
                        
                        <img src="{{ asset('storage/' . $scholarship->image) }}" 
                            alt="{{ $scholarship->name }}" 
                            class="w-full h-[240px] object-cover">

                        <div class="p-7 flex flex-col justify-between h-[270px]">
                            <h3 class="text-2xl font-bold text-gray-900 mb-3 leading-tight line-clamp-2">
                                {{ $scholarship->name }}
                            </h3>
                            <p class="text-gray-600 text-base mb-5 line-clamp-3">
                                {{ Str::limit($scholarship->description, 180, '...') }}
                            </p>
                            <div class="flex flex-wrap gap-2 mt-auto">
                                @if($scholarship->category)
                                    @foreach(explode(',', $scholarship->category) as $cat)
                                        <span class="px-3 py-1 bg-blue-100 text-blue-700 rounded-full text-sm font-semibold">
                                            {{ trim($cat) }}
                                        </span>
                                    @endforeach
                                @else
                                    <span class="px-3 py-1 bg-gray-200 text-gray-600 rounded-full text-sm">
                                        Uncategorized
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
<!-- ================= POPUP DETAIL ================= -->
<div 
    x-show="selectedScholarship" 
    x-transition.opacity
    class="fixed inset-0 bg-black/40 flex items-center justify-center z-50"
    x-cloak
    @click.self="selectedScholarship = null">

    <div 
        x-transition:enter="transition transform duration-300"
        x-transition:enter-start="scale-90 opacity-0"
        x-transition:enter-end="scale-100 opacity-100"
        x-transition:leave="transition transform duration-300"
        x-transition:leave-start="scale-100 opacity-100"
        x-transition:leave-end="scale-90 opacity-0"
        class="bg-white rounded-3xl w-full max-w-6xl p-10 shadow-2xl relative overflow-hidden">

        <!-- Close button (sedikit ke kiri) -->
        <button 
            @click="selectedScholarship = null" 
            class="absolute top-5 right-12 text-gray-500 hover:text-gray-800 text-3xl font-bold">
            ✕
        </button>

        <!-- CONTENT -->
        <template x-if="selectedScholarship">
            <div class="flex flex-col md:flex-row gap-10 mt-6">

                <!-- LEFT SECTION -->
                <div class="flex-1">
                    <div class="flex items-start justify-between mb-4">
                        <h2 class="text-4xl font-black text-gray-900" 
                            x-text="selectedScholarship.name"></h2>

                        <!-- Bookmark Button -->
                        <button 
                            class="ml-4 border-2 border-gray-300 hover:border-blue-500 text-gray-500 hover:text-blue-600 
                                rounded-full w-14 h-14 flex items-center justify-center transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" 
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                    d="M5 5v14l7-5 7 5V5a2 2 0 00-2-2H7a2 2 0 00-2 2z" />
                            </svg>
                        </button>
                    </div>

                    <h3 class="text-xl font-bold mb-2">Description</h3>
                    <p class="text-gray-700 leading-relaxed mb-6" 
                        x-text="selectedScholarship.description"></p>

                    <div class="flex gap-10 text-gray-900">
                        <div>
                            <p class="font-bold text-lg">Start At</p>
                            <p class="text-gray-700 text-base mt-1" 
                                x-text="selectedScholarship.start_date ?? 'DD/MM/YYYY'"></p>
                        </div>
                        <div>
                            <p class="font-bold text-lg">End At</p>
                            <p class="text-gray-700 text-base mt-1" 
                                x-text="selectedScholarship.end_date ?? 'DD/MM/YYYY'"></p>
                        </div>
                    </div>
                </div>

                <!-- RIGHT SECTION -->
                <div class="flex flex-col items-center md:w-[45%]">
                    <img 
                        :src="'/storage/' + selectedScholarship.image" 
                        class="w-full h-[550px] object-cover rounded-2xl border-2 border-blue-200 mb-6">

                    <x-pixel-button 
                        maincolor="#B8860B" 
                        shadowcolor="#B8860B" 
                        class="text-white w-full"
                        @click="window.open(selectedScholarship.link, '_blank')">
                        Apply Now!
                    </x-pixel-button>
                </div>
            </div>
        </template>
    </div>
</div> 
    @include('layouts.footer')
</div>
</x-app-layout>
