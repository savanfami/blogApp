@extends('layout.index')

@section('main')
<div class="max-w-4xl mx-auto mt-10 bg-white text-black p-8 rounded-lg shadow-lg">
    @if (Session('status'))
        <p class="bg-green-500 text-white p-3 rounded mb-4 text-center">{{ Session('status') }}</p>
    @endif

    <h1 class='text-2xl font-bold mb-6 text-center'>List Category</h1>
    <div class="overflow-x-auto">
        <table class="w-full border border-gray-700 text-center">
            <thead>
                <tr class="bg-gray-800 text-white">
                    <th class="p-3 border border-gray-700">Category Name</th>
                    <th class="p-3 border border-gray-700">Edit</th>
                    <th class="p-3 border border-gray-700">Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($allCategory as $cat )
                <tr class="border border-gray-700">
                    <td class="p-3">{{ $cat->name }}</td>
                    <td class="p-3">
                        <a href="{{ route('category.edit',$cat) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded">Edit</a>
                    </td>
                    <td class="p-3">
                        <form action="{{ route('category.delete',$cat) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="text-center mt-6">
        <a href="{{ route('categories.create') }}" class="bg-white text-black font-bold py-3 px-6 rounded shadow-md ">Create Category</a>
    </div>
</div>
@endsection
