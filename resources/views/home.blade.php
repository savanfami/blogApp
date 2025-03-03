@extends('layout.index')

@section('main')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <i class="fa fa-h-square" aria-hidden="true"></i>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    
                    @auth
                    <p>Welcome, {{ Auth::user()->name }}</p>
                    
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" class="btn btn-danger">Logout</button>
                    </form>
                    @endauth
                    
                    @guest
                    <p>Please Log In to view the Blogs</p>
                    @endguest
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6 text-center">
            <div class="d-flex flex-column gap-3">
                <a class="btn btn-primary" href="{{ route('blog.create') }}">Create Post</a>
                <a class="btn btn-primary" href="#">Create Category</a>
                <a class="btn btn-primary" href="#">List Categories</a>
            </div>
        </div>
    </div>
</div>
@endsection
