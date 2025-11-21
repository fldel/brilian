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
    <h1 class="text-5xl font-cave mb-6">Create Scholarship</h1>
    <form action="{{ route('admin.scholarships.store') }}" method="POST" enctype="multipart/form-data" class="grid grid-cols-1 md:grid-cols-2 gap-6">
        @csrf

        {{-- Left Section --}}
        <div>
            <div class="mb-4">
                <label for="name" class="block text-lg font-semibold mb-2">Name</label>
                <input type="text" name="name" id="name" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-200" required>
            </div>

            <div class="mb-4">
                <label for="description" class="block text-lg font-semibold mb-2">Description</label>
                <textarea name="description" id="description" rows="4" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-200" required></textarea>
            </div>

            <div class="mb-4">
                <label for="link" class="block text-lg font-semibold mb-2">Link</label>
                <input type="url" name="link" id="link" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-200" required>
            </div>

            <div class="mb-4">
                <label for="is_available" class="block text-lg font-semibold mb-2">Available</label>
                <select name="is_available" id="is_available" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-200" required>
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                </select>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label for="start_date" class="block text-lg font-semibold mb-2">Start Date</label>
                    <input type="date" name="start_date" id="start_date" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-200" required>
                </div>
                <div>
                    <label for="end_date" class="block text-lg font-semibold mb-2">End Date</label>
                    <input type="date" name="end_date" id="end_date" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-200" required>
                </div>
            </div>
        </div>

        {{-- Right Section --}}
        <div>
            <div class="mb-4">
                <label for="category" class="block text-lg font-semibold mb-2">Category</label>
                <select name="category" id="category" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-200" required>
                    <option value="d1">D1</option>
                    <option value="d2">D2</option>
                    <option value="d3">D3</option>
                    <option value="d4">D4</option>
                    <option value="s1">S1</option>
                    <option value="s2">S2</option>
                    <option value="s3">S3</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="image" class="block text-lg font-semibold mb-2">Image</label>
                <input type="file" name="image" id="image" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-200">
            </div>

            <button type="submit" class="w-full py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-all duration-200">Create Scholarship</button>
        </div>
    </form>
</div>
@endsection
</body>
</html>