<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Brilian') }}</title>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50">

    <header class="flex justify-between items-center bg-white border-[3px] border-[#D8E0E4] rounded-2xl px-6 py-6 m-5 shadow-sm">
        <!-- Date -->
        <div>
            <span class="px-8 py-3 border border-black/50 rounded-full font-cave text-2xl text-black/80">
                {{ \Carbon\Carbon::now()->translatedFormat('l, jS F') }}
            </span>
        </div>

        <!-- Admin Info -->
        <div class="flex items-center text-base font-semibold text-green-600 gap-2">
            <span class="w-3 h-3 bg-green-500 rounded-full"></span>
            <span>Admin</span>
        </div>
    </header>

</body>
</html>
