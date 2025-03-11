@extends('layout.index')

@section('main')
<div class="max-w-md mx-auto mt-10 bg-white text-gray-500 p-8 rounded-lg shadow-lg">
    <h2 class="text-2xl font-bold mb-6 text-center">Create Category</h2>

    @if (Session('status'))
        <p class="bg-green-500 text-white p-3 rounded mb-4 text-center">{{ Session('status') }}</p>
    @endif

    <div class=" p-6 rounded-lg">
        <form action="{{ route('category.store') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label for="name" class="block text-sm font-medium text-black">Name:</label>
                <input type="text" name="name" class="w-full mt-1 p-3 border border-gray-700  rounded " value="{{ old('name') }}">
                @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            
            <button type="submit" class="w-full bg-blue-600  text-white font-bold py-3 px-6 rounded transition duration-300">Create </button>
        </form>
        
        <a href="{{ route('categories.index') }}" class="block text-center bg-gray-700 hover:bg-gray-600 text-white font-bold py-3 px-6 rounded mt-4 transition duration-300">All Categories</a>
    </div>
</div>
@endsection