@extends('layouts.admin')

@section('content')
<div class="p-6">
    <h1 class="text-5xl font-cave mb-6">Edit User</h1>

    @if ($errors->any())
        <div class="mb-4 bg-red-100 text-red-700 p-3 rounded-md">
            <ul class="list-disc ml-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.users.update', $user->id) }}" method="POST" 
          class="bg-white p-6 rounded-xl shadow-md space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="block text-gray-700 mb-1">Name</label>
            <input type="text" name="name" value="{{ old('name', $user->name) }}" 
                   class="w-full border-gray-300 rounded-lg">
        </div>

        <div>
            <label class="block text-gray-700 mb-1">Email</label>
            <input type="email" name="email" value="{{ old('email', $user->email) }}" 
                   class="w-full border-gray-300 rounded-lg">
        </div>

        <div>
            <label class="block text-gray-700 mb-1">Role</label>
            <select name="role" class="w-full border-gray-300 rounded-lg">
                <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User</option>
            </select>
        </div>

        <div>
            <label class="block text-gray-700 mb-1">New Password</label>
            <input type="password" name="password" placeholder="Leave blank to keep old password" 
                   class="w-full border-gray-300 rounded-lg">
        </div>

        <button class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
            Update
        </button>
    </form>
</div>
@endsection
