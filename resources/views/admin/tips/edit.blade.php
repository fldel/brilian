@extends('layouts.admin')

@section('content')
<div class="p-6">
    <h1 class="text-2xl font-bold mb-6 text-gray-800">Edit Tip</h1>

    <form action="{{ route('admin.tips.update', $tip->id) }}" 
          method="POST" 
          enctype="multipart/form-data"
          class="bg-white p-6 rounded-xl shadow-md space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="block text-gray-700 mb-1 font-semibold">Title</label>
            <input type="text" name="title" value="{{ old('title', $tip->title) }}" 
                   class="w-full border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
        </div>

        <div>
            <label class="block text-gray-700 mb-1 font-semibold">Content</label>
            <textarea name="content" rows="4" class="w-full border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">{{ old('content', $tip->content) }}</textarea>
        </div>

        <div>
            <label class="block text-gray-700 mb-1 font-semibold">Link (optional)</label>
            <input type="url" name="link" value="{{ old('link', $tip->link) }}" 
                   class="w-full border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
        </div>

        <div>
            <label class="block text-gray-700 mb-1 font-semibold">Image</label>
            <input type="file" name="image" class="w-full">
            @if($tip->image)
                <img src="{{ asset('storage/' . $tip->image) }}" class="w-24 mt-2 rounded">
            @endif
        </div>

        <button type="submit" 
                class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
            Update Tip
        </button>
    </form>
</div>
@endsection
