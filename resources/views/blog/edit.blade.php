@extends('layout.index')

@section('main')
<div class="container" style="margin-top: 100px;">
    <h2 style="color:white">Edit Blog </h2>

@if (Session('status'))
 <p style="background-color: green;color: white;padding: 1rem;">{{ Session('status') }}</p>
@endif

    <form  method="POST" action="{{ route('blog.update',$editPost) }}" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="form-group">
            <label style="color:white" for="title">Title:</label>
            <input  type="text" name="title" class="form-control" value="{{ $editPost->title }}" >
            @error('title') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

 
        <div class="form-group">
            <label style="color:white" for="image">Upload Image:</label>
            <input type="file" name="image" class="form-control-file" >
            @error('image') <span class="text-danger">{{ $message }}</span> @enderror

        </div>

  
        <div class="form-group">
            <label style="color:white" for="body">Body:</label>
            <textarea name="body" class="form-control" rows="5" >{{ $editPost->body }}</textarea>
            @error('body') <span class="text-danger">{{ $message }}</span> @enderror

        </div>

  
        <button type="submit" class="btn btn-primary mt-3">Edit Post</button>
    </form>
</div>
@endsection
