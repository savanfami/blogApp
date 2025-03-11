@extends('layout.index')

@section('main')
<div class="max-w-2xl mx-auto mt-10 bg-white text-black p-8 rounded-lg shadow-lg">

    @if (Session('status'))
        <p class="bg-green-500 text-white p-3 rounded mb-4 text-center">{{ Session('status') }}</p>
    @endif

    <form method="POST" action="{{ route('blog.update', $editPost) }}" enctype="multipart/form-data" class="space-y-4">
        @csrf
        @method('put')
        
        <div>
            <label for="title" class="block text-sm font-medium">Title:</label>
            <input type="text" name="title" class="w-full mt-1 p-3 border border-gray-700 bg-white rounded focus:ring  focus:outline-none" value="{{ $editPost->title }}">
            @error('title') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="image" class="block text-sm font-medium">Upload Image:</label>
            <input type="file" name="image" class="w-full mt-1 p-2 border border-gray-700 bg-white rounded focus:ring  focus:outline-none">
            @error('image') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="body" class="block text-sm font-medium">Body:</label>
            <textarea name="body" class="w-full mt-1 p-3 border border-gray-700 bg-white rounded focus:ring  focus:outline-none" rows="5">{{ $editPost->body }}</textarea>
            @error('body') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="w-full bg-blue-600 rounded-md text-white font-bold py-3 px-6 rounded transition duration-300">Edit Post</button>
    </form>
</div>
@endsection
