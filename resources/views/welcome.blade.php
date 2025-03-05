@extends('layout.index')
@section('main')

  <header class="header">
    <div class="header-text">
    <h1 style="background: none;" >Blog World</h1>
    </div>
    <div class="overlay"></div>
  </header>

  <main class="container">
    <h2 class="header-title">Latest Blog Posts</h2>
    <section class="cards-blog latest-blog">
  @foreach ($allPosts as $post)
    <div class="card-blog-content">
    <img src="{{ asset($post['image_path']) }}" alt="Post Image" />
    <p style="color: white;">
    {{ $post->created_at->diffForHumans() }}
    <span style="color: white;">Written by {{ $post->user->name ?? 'Unknown' }}</span>
    </p>
    <h4>
    <a style="color: whitesmoke;" href="{{ route('blog.show', ['slug' => $post->slug]) }}">{{ $post->title }}</a>
    </h4>
    </div>
  @endforeach







    </section>
  </main>

@endsection