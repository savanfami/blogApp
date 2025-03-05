@extends('layout.index')

@section('main')
<div class="container col-md-6" style="margin-top: 100px;">
    <h2 style="color: white;">Create Category</h2>

@if (Session('status'))
 <p style="background-color: green;color: white;padding: 1rem;">{{ Session('status') }}</p>
@endif

<div class="card">
    <div class="card-body">
    <form action="{{ route('category.store') }}"  method="POST" >
        @csrf
        <div class="form-group">
            <label style="color: white;" for="name">Name:</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}" >
            @error('title') <span class="text-danger">{{ $message }}</span> @enderror
        </div>  
        <button type="submit" class="btn btn-primary mt-3">Create Category</button>
    </form>
    <a href="{{ route('categories.index') }}" class=" mt-3 btn btn-primary" >all Category</a>
    </div>
</div>
</div>
@endsection
