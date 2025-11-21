@extends('layouts.admin')

@section('content')
<div class="p-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-5xl font-cave text-gray-800">Scholarships List</h1>
        <a href="{{ route('admin.scholarships.create') }}" 
           class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
           + Add New
        </a>
    </div>

    @if(session('success'))
        <div class="mb-4 p-3 bg-green-100 text-green-800 rounded-md">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded-xl shadow-md overflow-hidden">
        <table class="min-w-full text-sm text-gray-700">
            <thead class="bg-gray-100 text-gray-800 font-semibold">
                <tr>
                    <th class="px-4 py-3 text-left">#</th>
                    <th class="px-4 py-3 text-left">Name</th>
                    <th class="px-4 py-3 text-left">Description</th>
                    <th class="px-4 py-3 text-left">Image</th>
                    <th class="px-4 py-3 text-left">Status</th>
                    <th class="px-4 py-3 text-right">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($scholarships as $index => $scholarship)
                    <tr class="border-t hover:bg-gray-50">
                        <td class="px-4 py-3">{{ $index + 1 }}</td>
                        <td class="px-4 py-3 font-medium">{{ $scholarship->name }}</td>
                        <td class="px-4 py-3">{{ Str::limit($scholarship->description, 50) }}</td>
                        <td class="px-4 py-3">
                            @if($scholarship->image)
                                <img src="{{ asset('storage/' . $scholarship->image) }}" 
                                     class="w-16 h-16 rounded object-cover">
                            @else
                                <span class="text-gray-400 italic">No Image</span>
                            @endif
                        </td>
                        <td class="px-4 py-3">
                            @if($scholarship->is_available)
                                <span class="text-green-600 font-semibold">Active</span>
                            @else
                                <span class="text-red-600 font-semibold">Closed</span>
                            @endif
                        </td>
                        <td class="px-4 py-3 text-right">
                            <a href="{{ route('admin.scholarships.edit', $scholarship->id) }}" 
                               class="text-blue-600 hover:underline">Edit</a>

                            <form action="{{ route('admin.scholarships.destroy', $scholarship->id) }}" 
                                  method="POST" 
                                  class="inline-block ml-3"
                                  onsubmit="return confirm('Are you sure you want to delete this scholarship?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center py-6 text-gray-400">No scholarships found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
