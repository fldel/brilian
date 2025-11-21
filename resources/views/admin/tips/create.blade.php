<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Brilian') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
@extends('layouts.admin')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-5xl font-cave mb-6">Create New Tip</h1>
    <form action="{{ route('admin.tips.store') }}" method="POST" enctype="multipart/form-data" class="grid grid-cols-1 gap-6">
        @csrf

        <div class="mb-4">
            <label for="title" class="block text-lg font-semibold mb-2">Title</label>
            <input type="text" name="title" id="title" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-200" required>
        </div>

        <div class="mb-4">
            <label for="content" class="block text-lg font-semibold mb-2">Content</label>
            <textarea name="content" id="content" rows="4" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-200" required></textarea>
        </div>

        <div class="mb-4">
            <label for="link" class="block text-lg font-semibold mb-2">Link</label>
            <input type="url" name="link" id="link" 
                class="w-full border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-200" 
                placeholder="https://example.com">
        </div>

        <div class="mb-4">
            <label for="image" class="block text-lg font-semibold mb-2">Image</label>
            <input type="file" name="image" id="image" accept="image/*" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-200">
        </div>

        <button type="submit" class="w-full py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-all duration-200">Create Tip</button>
    </form>
</div>
@endsection
</body>
</html>