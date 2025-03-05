@extends('layout.index')

@section('main')
<div class="container" style="margin-top: 100px;">
    <h2>Create Blog Post</h2>

@if (Session('status'))
 <p style="background-color: green;color: white;padding: 1rem;">{{ Session('status') }}</p>
@endif

    <form  method="POST" action="{{ route('blog.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" name="title" class="form-control" value="{{ old('title') }}" >
            @error('title') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

 
        <div class="form-group">
            <label for="image">Upload Image:</label>
            <input type="file" name="image" class="form-control-file" >
            @error('image') <span class="text-danger">{{ $message }}</span> @enderror

        </div>

        <div class="form-group">
            <label for="category">Select Category:</label>
            <select name="categories_id" class="form-control" >
                @foreach ($cat as $dd)
                <option value="{{  $dd->id}}">{{  $dd->name}}</option>
                @endforeach
               
            </select>
        </div>

        <!-- Body -->
        <div class="form-group">
            <label for="body">Body:</label>
            <textarea name="body" class="form-control" rows="5" >{{ old('body') }}</textarea>
            @error('body') <span class="text-danger">{{ $message }}</span> @enderror

        </div>

  
        <button type="submit" class="btn btn-primary">Create Post</button>
    </form>
</div>
@endsection


