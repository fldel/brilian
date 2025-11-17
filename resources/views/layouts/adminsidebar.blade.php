<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Brilian') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-50">
    <aside class="w-[300px] h-[95vh] m-5 bg-[#F1F3F4] border-[3px] border-[#D8E0E4] rounded-2xl flex flex-col justify-between shadow-md">
        {{-- Logo Section --}}
        <div>
            <div class="p-6 text-center flex flex-col items-center">
                <x-application-logo class="w-14 h-14 mb-2"/>
                <h1 class="text-3xl font-cave tracking-wide">BRILIAN</h1>
                <hr class="w-full mt-4 border-t border-gray-300">
            </div>

            {{-- Navigation --}}
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

                <a href="{{ route('admin.scholarships.index') }}" class="flex items-center gap-3 px-5 py-3 text-3xl font-cave rounded-md transition-all duration-200 hover:bg-[#081226] hover:text-white text-black">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12.4472 4.10557c-.2815-.14076-.6129-.14076-.8944 0L2.76981 8.49706l9.21949 4.39024L21 8.38195l-8.5528-4.27638Z"/>
                        <path d="M5 17.2222v-5.448l6.5701 3.1286c.278.1325.6016.1293.8771-.0084L19 11.618v5.6042c0 .2857-.1229.5583-.3364.7481z"/>
                    </svg>
                    Scholarships
                </a>

                <a href="{{ route('admin.tips.index') }}" class="flex items-center gap-3 px-5 py-3 text-3xl font-cave rounded-md transition-all duration-200 hover:bg-[#081226] hover:text-white text-black">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm6 4c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995A.905.905 0 0 1 8 4m.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2"/>
                    </svg>
                    Tips
                </a>

                <a href="{{ route('admin.users.index') }}" class="flex items-center gap-3 px-5 py-3 text-3xl font-cave rounded-md transition-all duration-200 hover:bg-[#081226] hover:text-white text-black">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1-1-1-1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                    </svg>
                    Users
                </a>

                <a href="{{ route('admin.settings') }}" class="flex items-center gap-3 px-5 py-3 text-3xl font-cave rounded-md transition-all duration-200 hover:bg-[#081226] hover:text-white text-black">
                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 50 50">
                        <path d="M47.16,21.221l-5.91-0.966c-0.346-1.186-0.819-2.326-1.411-3.405l3.45-4.917c0.279-0.397,0.231-0.938-0.112-1.282 l-3.889-3.887c-0.347-0.346-0.893-0.391-1.291-0.104l-4.843,3.481c-1.089-0.602-2.239-1.08-3.432-1.427l-1.031-5.886 C28.607,2.35,28.192,2,27.706,2h-5.5c-0.49,0-0.908,0.355-0.987,0.839l-0.956,5.854c-1.2,0.345-2.352,0.818-3.437,1.412l-4.83-3.45 c-0.399-0.285-0.942-0.239-1.289,0.106L6.82,10.648c-0.343,0.343-0.391,0.883-0.112,1.28l3.399,4.863 c-0.605,1.095-1.087,2.254-1.438,3.46l-5.831,0.971c-0.482,0.08-0.836,0.498-0.836,0.986v5.5c0,0.485,0.348,0.9,0.825,0.985 l5.831,1.034c0.349,1.203,0.831,2.362,1.438,3.46l-3.441,4.813c-0.284,0.397-0.239,0.942,0.106,1.289l3.888,3.891 c0.343,0.343,0.884,0.391,1.281,0.112l4.87-3.411c1.093,0.601,2.248,1.078,3.445,1.424l0.976,5.861C21.3,47.647,21.717,48,22.206,48 h5.5c0.485,0,0.9-0.348,0.984-0.825l1.045-5.89c1.199-0.353,2.348-0.833,3.43-1.435l4.905,3.441 c0.398,0.281,0.938,0.232,1.282-0.111l3.888-3.891c0.346-0.347,0.391-0.894,0.104-1.292l-3.498-4.857 c0.593-1.08,1.064-2.222,1.407-3.408l5.918-1.039c0.479-0.084,0.827-0.5,0.827-0.985v-5.5C47.999,21.718,47.644,21.3,47.16,21.221z M25,32c-3.866,0-7-3.134-7-7c0-3.866,3.134-7,7-7s7,3.134,7,7C32,28.866,28.866,32,25,32z"></path>
                    </svg>
                    Settings
                </a>
            </nav>
        </div>

        {{-- Admin Profile --}}
        <div class="p-6 flex flex-col items-center text-center mb-2">
            <p class="font-cave text-2xl">{{ Auth::user()->name }}</p>
            <p class="font-cave text-lg text-gray-500">{{ Auth::user()->email }}</p>

            {{-- Logout Button --}}
            <form method="POST" action="{{ route('logout') }}" class="mt-4">
                @csrf
                <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-all duration-200">
                    Logout
                </button>
            </form>
        </div>
    </aside>
</body>
</html>
