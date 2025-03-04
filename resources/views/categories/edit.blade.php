@extends('layout.index')

@section('main')
    <div class="container col-md-6" style="margin-top: 100px;">
        <h2>Edit Category</h2>

        @if (Session('status'))
            <p style="background-color: green;color: white;padding: 1rem;">{{ Session('status') }}</p>
        @endif

        <div class="card">
            <div class="card-body">
                <form action="{{ route('category.update',parameters: $editCat) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" name="name" class="form-control" value="{{ $editCat->name }}">
                        @error('title') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection