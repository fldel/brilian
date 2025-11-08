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
<body class="bg-white flex">

    {{-- Sidebar --}}
    @include('layouts.adminsidebar')

    {{-- Main content --}}
    <div class="flex-1 flex flex-col">
        {{-- Header --}}
        @include('layouts.adminheader')

        {{-- Content --}}
        <main class="p-6">
            @yield('content')
        </main>
    </div>

</body>
</html>
