@extends('layout.index')

@section('main')
    <div class="container" style="margin-top: 100px;">
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
                            Please Log In to view the Blogs
                        @endguest

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection