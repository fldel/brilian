@extends('layouts.admin')

@section('content')
<div class="p-6">
    <h1 class="text-5xl font-cave mb-6">Edit Scholarship</h1>

    <form action="{{ route('admin.scholarships.update', $scholarship->id) }}" 
          method="POST" enctype="multipart/form-data" 
          class="bg-white p-6 rounded-xl shadow-md space-y-4">
        @csrf
        @method('PUT')

        {{-- NAME --}}
        <div>
            <label class="block text-gray-700 mb-1">Name</label>
            <input type="text" name="name" value="{{ old('name', $scholarship->name) }}" 
                   class="w-full border-gray-300 rounded-lg">
        </div>

        {{-- DESCRIPTION --}}
        <div>
            <label class="block text-gray-700 mb-1">Description</label>
            <textarea name="description" rows="4" class="w-full border-gray-300 rounded-lg">{{ old('description', $scholarship->description) }}</textarea>
        </div>

        {{-- IMAGE --}}
        <div>
            <label class="block text-gray-700 mb-1">Image</label>
            <input type="file" name="image" class="w-full">
            @if($scholarship->image)
                <img src="{{ asset('storage/' . $scholarship->image) }}" class="w-24 mt-2 rounded">
            @endif
        </div>

        {{-- LINK --}}
        <div>
            <label class="block text-gray-700 mb-1">Link</label>
            <input type="url" name="link" value="{{ old('link', $scholarship->link) }}" 
                   class="w-full border-gray-300 rounded-lg">
        </div>

        {{-- CATEGORY --}}
        <div>
            <label class="block text-gray-700 mb-1">Category</label>
            <select name="category" class="w-full border-gray-300 rounded-lg">
                @foreach (['d1','d2','d3','d4','s1','s2','s3'] as $cat)
                    <option value="{{ $cat }}" {{ $scholarship->category == $cat ? 'selected' : '' }}>
                        {{ strtoupper($cat) }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- START DATE --}}
        <div>
            <label class="block text-gray-700 mb-1">Start Date</label>
            <input type="date" name="start_date" value="{{ old('start_date', $scholarship->start_date) }}" 
                   class="w-full border-gray-300 rounded-lg">
        </div>

        {{-- END DATE --}}
        <div>
            <label class="block text-gray-700 mb-1">End Date</label>
            <input type="date" name="end_date" value="{{ old('end_date', $scholarship->end_date) }}" 
                   class="w-full border-gray-300 rounded-lg">
        </div>

        {{-- AVAILABLE --}}
        <div>
            <label class="inline-flex items-center">
                <input type="hidden" name="is_available" value="0">
                <input type="checkbox" name="is_available" value="1" {{ $scholarship->is_available ? 'checked' : '' }}>
                <span class="ml-2 text-gray-700">Available</span>
            </label>
        </div>

        {{-- BUTTON --}}
        <button class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
            Update
        </button>
    </form>
</div>
@endsection
