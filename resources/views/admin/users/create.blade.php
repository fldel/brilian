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
    <h1 class="text-3xl font-bold mb-6">Create New User</h1>
    <form action="{{ route('admin.users.store') }}" method="POST" class="grid grid-cols-1 gap-6">
        @csrf

        <div class="mb-4">
            <label for="name" class="block text-lg font-semibold mb-2">Name</label>
            <input type="text" name="name" id="name" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-200" required>
        </div>

        <div class="mb-4">
            <label for="email" class="block text-lg font-semibold mb-2">Email</label>
            <input type="email" name="email" id="email" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-200" required>
        </div>

        <div class="mb-4">
            <label for="password" class="block text-lg font-semibold mb-2">Password</label>
            <input type="password" name="password" id="password" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-200" required>
        </div>

        <div class="mb-4">
            <label for="role" class="block text-lg font-semibold mb-2">Role</label>
            <select name="role" id="role" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-200" required>
                <option value="admin">Admin</option>
                <option value="user">User</option>
            </select>
        </div>

        <button type="submit" class="w-full py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-all duration-200">Create User</button>
    </form>
</div>
@endsection
</body>
</html>