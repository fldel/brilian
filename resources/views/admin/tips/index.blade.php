@extends('layouts.admin')

@section('content')
<div class="p-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-5xl font-cave text-gray-800">Tips List</h1>
        <a href="{{ route('admin.tips.create') }}" 
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
                    <th class="px-6 py-3 text-left">Title</th>
                    <th class="px-6 py-3 text-left">Content</th>
                    <th class="px-6 py-3 text-left">Author</th>
                    <th class="px-6 py-3 text-left">Link</th>
                    <th class="px-6 py-3 text-left">Actions</th>
                </tr>
            </thead>

            <tbody>
                @forelse($tips as $tip)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-6 py-3">{{ $tip->title }}</td>

                        <td class="px-6 py-3">
                            {{ Str::limit($tip->content, 50) }}
                        </td>

                        <td class="px-6 py-3">
                            {{ $tip->user->name }}
                        </td>

                        <td class="px-6 py-3">
                            @if($tip->link)
                                <a href="{{ $tip->link }}" target="_blank" 
                                   class="text-blue-600 hover:underline">
                                    Visit Link
                                </a>
                            @else
                                <span class="text-gray-400 italic">No link</span>
                            @endif
                        </td>

                        <td class="px-6 py-3">
                            <div class="flex items-center space-x-4">

                                {{-- Edit Button --}}
                                <a href="{{ route('admin.tips.edit', $tip->id) }}" 
                                   class="text-blue-600 hover:text-blue-800 font-medium">
                                    Edit
                                </a>

                                {{-- Delete Button --}}
                                <form action="{{ route('admin.tips.destroy', $tip->id) }}" 
                                      method="POST"
                                      onsubmit="return confirm('Are you sure you want to delete this tip?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="text-red-600 hover:text-red-800 font-medium">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>

                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-3 text-center text-gray-500">
                            No tips found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
