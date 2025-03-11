@extends('layout.index')

@section('main')
    <div class="max-w-md mx-auto mt-10 bg-white p-8 rounded-lg shadow-lg">


        @if (Session('status'))
            <p class="bg-green-500 text-white p-3 rounded mb-4 text-center">{{ Session('status') }}</p>
        @endif

        <div class=" p-6 rounded-lg">
            <form action="{{ route('category.update', $editCat) }}" method="POST" class="space-y-4">
                @csrf
                @method('put')
                <div>
                    <label for="name" class="block text-sm font-medium">Name:</label>
                    <input type="text" name="name" class="w-full mt-1 p-3 border border-gray-700  rounded " value="{{ $editCat->name }}">
                    @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
                
                <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded transition duration-300">Submit</button>
            </form>
        </div>
    </div>
@endsection
