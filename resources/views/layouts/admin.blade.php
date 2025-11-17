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


    {{-- ========================= --}}
    {{--       TOAST SUCCESS       --}}
    {{-- ========================= --}}
    @if(session('success'))
        <div id="toast-success"
             class="fixed top-4 right-4 z-50 bg-green-600 text-white px-4 py-3 rounded-lg shadow-lg opacity-0 translate-x-5 transition-all duration-500">
            {{ session('success') }}
        </div>
    @endif

    {{-- ========================= --}}
    {{--        TOAST ERROR        --}}
    {{-- ========================= --}}
    @if($errors->any())
        <div id="toast-error"
             class="fixed top-4 right-4 z-50 bg-red-600 text-white px-4 py-3 rounded-lg shadow-lg opacity-0 translate-x-5 transition-all duration-500">
            {{ $errors->first() }}
        </div>
    @endif


    {{-- ========================= --}}
    {{--      TOAST SCRIPT JS      --}}
    {{-- ========================= --}}
    <script>
        document.addEventListener("DOMContentLoaded", function () {

            // SUCCESS TOAST
            const toastSuccess = document.getElementById("toast-success");
            if (toastSuccess) {
                setTimeout(() => toastSuccess.classList.remove("opacity-0", "translate-x-5"), 150);
                setTimeout(() => toastSuccess.classList.add("opacity-0", "translate-x-5"), 3200);
                setTimeout(() => toastSuccess.remove(), 3800);
            }

            // ERROR TOAST
            const toastError = document.getElementById("toast-error");
            if (toastError) {
                setTimeout(() => toastError.classList.remove("opacity-0", "translate-x-5"), 150);
                setTimeout(() => toastError.classList.add("opacity-0", "translate-x-5"), 3200);
                setTimeout(() => toastError.remove(), 3800);
            }
        });
    </script>

</body>
</html>
