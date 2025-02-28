@extends('layout.index')

@section('main')
<div class="container" style="margin-top: 100px;">
    <h2>Create Blog Post</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form  method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Title -->
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" name="title" class="form-control" value="{{ old('title') }}" required>
        </div>

        <!-- Image Upload -->
        <div class="form-group">
            <label for="image">Upload Image:</label>
            <input type="file" name="image" class="form-control-file" required>
        </div>

        <!-- Category Selection -->
        <div class="form-group">
            <label for="category">Select Category:</label>
            <select name="category" class="form-control" required>
                <option value="">Choose Category</option>
               
            </select>
        </div>

        <!-- Body -->
        <div class="form-group">
            <label for="body">Body:</label>
            <textarea name="body" class="form-control" rows="5" required>{{ old('body') }}</textarea>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Create Post</button>
    </form>
</div>
@endsection
