@extends('layout.index')

@section('main')
<div class="max-w-2xl mx-auto mt-10  black p-8 rounded-lg shadow-lg">
    <h2 class="text-2xl font-bold font-serif mb-6 text-center">Create Blog </h2>

    @if (Session('status'))
        <p class="bg-green-500 black p-3 rounded mb-4 text-center">{{ Session('status') }}</p>
    @endif

    <form method="POST" action="{{ route('blog.store') }}" enctype="multipart/form-data" class="space-y-4">
        @csrf
        
        <div>
            <label for="title" class="block text-sm font-medium">Title:</label>
            <input type="text" name="title" class="w-full mt-1 p-3 border border-gray-700 bg-white rounded focus:ring focus:ring-blue-500 focus:outline-none" value="{{ old('title') }}">
            @error('title') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="image" class="block text-sm font-medium">Upload Image:</label>
            <input type="file" name="image" class="w-full mt-1 p-2 border border-gray-700 bg-white rounded focus:ring focus:ring-blue-500 focus:outline-none">
            @error('image') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="category" class="block text-sm font-medium">Select Category:</label>
            <select name="categories_id" class="w-full mt-1 p-3 border border-gray-700 bg-white rounded focus:ring focus:ring-blue-500 focus:outline-none">
                @foreach ($cat as $dd)
                    <option value="{{ $dd->id }}">{{ $dd->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="body" class="block text-sm font-medium">Body:</label>
            <textarea name="body" class="w-full mt-1 p-3 border border-gray-700 bg-white rounded focus:ring focus:ring-blue-500 focus:outline-none" rows="5">{{ old('body') }}</textarea>
            @error('body') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="w-full bg-blue-700 text-white  black font-bold py-3 px-6 rounded transition duration-300">Create</button>
    </form>
</div>
@endsection
