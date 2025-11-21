<aside class="w-[300px] h-[95vh] bg-[#F1F3F4] border-[3px] border-[#D8E0E4] rounded-2xl flex flex-col justify-between shadow-md">

    {{-- LOGO --}}
    <div>
        <div class="p-6 text-center flex flex-col items-center">
            <x-application-logo class="w-14 h-14 mb-2"/>
            <h1 class="text-3xl font-cave tracking-wide">BRILIAN</h1>
            <hr class="w-full mt-4 border-t border-gray-300">
        </div>

        {{-- NAVIGATION --}}
        <nav class="mt-6 flex flex-col gap-3 px-4">

            <a href="{{ route('admin.dashboard') }}"
               class="flex items-center gap-3 px-5 py-3 text-3xl font-cave rounded-md transition-all duration-200
               {{ request()->routeIs('admin.dashboard') ? 'bg-[#081226] text-white' : 'hover:bg-[#081226] hover:text-white text-black' }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" viewBox="0 0 24 24">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <path d="M5 3h5a1 1 0 0 1 1 1v3a1 1 0 0 1 -1 1h-6a1 1 0 0 1 -1 -1v-2a2 2 0 0 1 2 -2" />
                    <path d="M14 3h5a2 2 0 0 1 2 2v8a1 1 0 0 1 -1 1h-6a1 1 0 0 1 -1 -1v-9a1 1 0 0 1 1 -1" />
                    <path d="M14 16h6a1 1 0 0 1 1 1v2a2 2 0 0 1 -2 2h-5a1 1 0 0 1 -1 -1v-3a1 1 0 0 1 1 -1" />
                    <path d="M4 10h6a1 1 0 0 1 1 1v9a1 1 0 0 1 -1 1h-5a2 2 0 0 1 -2 -2v-8a1 1 0 0 1 1 -1" />
                </svg>
                Dashboard
            </a>

            <a href="{{ route('admin.scholarships.index') }}"
               class="flex items-center gap-3 px-5 py-3 text-3xl font-cave rounded-md transition-all duration-200 hover:bg-[#081226] hover:text-white text-black">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12.4472 4.10557c-.2815-.14076-.6129-.14076-.8944 0L2.76981 8.49706l9.21949 4.39024L21 8.38195l-8.5528-4.27638Z"/>
                    <path d="M5 17.2222v-5.448l6.5701 3.1286c.278.1325.6016.1293.8771-.0084L19 11.618v5.6042c0 .2857-.1229.5583-.3364.7481z"/>
                </svg>
                Scholarships
            </a>

            <a href="{{ route('admin.tips.index') }}"
               class="flex items-center gap-3 px-5 py-3 text-3xl font-cave rounded-md transition-all duration-200 hover:bg-[#081226] hover:text-white text-black">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm6 4c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995A.905.905 0 0 1 8 4m.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2"/>
                </svg>
                Tips
            </a>

            <a href="{{ route('admin.users.index') }}"
               class="flex items-center gap-3 px-5 py-3 text-3xl font-cave rounded-md transition-all duration-200 hover:bg-[#081226] hover:text-white text-black">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                    <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1-1-1-1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                </svg>
                Users
            </a>

        </nav>
    </div>

    {{-- PROFILE --}}
    <div class="p-6 flex flex-col items-center text-center mb-2">
        <p class="font-cave text-2xl">{{ Auth::user()->name }}</p>
        <p class="font-cave text-lg text-gray-500">{{ Auth::user()->email }}</p>

        <form method="POST" action="{{ route('logout') }}" class="mt-4">
            @csrf
            <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-all duration-200">
                Logout
            </button>
        </form>
    </div>

</aside>
