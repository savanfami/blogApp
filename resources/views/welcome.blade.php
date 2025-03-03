@extends('layout.index')
@section('main')

  <header class="header">
    <div class="header-text">
    <h1>Blog World</h1>
    </div>
    <div class="overlay"></div>
  </header>

  <main class="container">
    <h2 class="header-title">Latest Blog Posts</h2>
    <section class="cards-blog latest-blog">
  @foreach ($allPosts as $post)
    <div class="card-blog-content">
    <img src="{{ asset($post['image_path']) }}" alt="Post Image" />
    <p>
    {{ $post->created_at->diffForHumans() }}
    <span>Written by {{ $post->user->name ?? 'Unknown' }}</span>
    </p>
    <h4>
    <a href="{{ route('blog.show', ['slug' => $post->slug]) }}">{{ $post->title }}</a>
    </h4>
    </div>
  @endforeach







    </section>
  </main>

@endsection