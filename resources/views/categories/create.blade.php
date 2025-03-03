@extends('layout.index')

@section('main')
<div class="container" style="margin-top: 100px;">
    <h2>Create Category</h2>

@if (Session('status'))
 <p style="background-color: green;color: white;padding: 1rem;">{{ Session('status') }}</p>
@endif

    <form  method="POST" >
        @csrf
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}" >
            @error('title') <span class="text-danger">{{ $message }}</span> @enderror
        </div>



        <!-- <div class="form-group">
            <label for="category">Select Category:</label>
            <select name="category" class="form-control" >
                <option value="">Choose Category</option>
               
            </select>
        </div> -->

        <!-- Body -->
     

  
        <button type="submit" class="btn btn-primary">Create Post</button>
    </form>
</div>
@endsection
