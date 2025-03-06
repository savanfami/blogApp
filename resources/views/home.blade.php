@extends('layout.index')

@section('main')

<div class="container mt-5" >
    <div class="row justify-content-center">
        <div class="col-md-6 text-center">
            <div class="d-flex justify-content-center gap-5 flex-wrap">
                <a class="btn bg-white" href="{{ route('blog.create') }}">Create Post</a>
                <a class="btn bg-white" href="{{ route('categories.create') }}">Create Category</a>
                <a class="btn bg-white " href="{{ route('categories.index') }}">List Categories</a>
            </div>
        </div>
    </div>
</div>

<div class="container mt-5 ">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-2 border-indigo-600">
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    @auth
                    <p style="color: white; font-size: 20px;">Welcome  {{ Auth::user()->name }}</p>
                    
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" class="btn btn-danger">Logout</button>
                    </form>
                    @endauth
                    
                    @guest
                    <p style="color:white">Please Log In to view the Blogs</p>
                    @endguest
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
