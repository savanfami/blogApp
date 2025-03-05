@extends('layout.index')
@section('main')


  <main class="container">
    <section class="single-blog-post">
    <h1>{{ $post->title }}</h1>

    <p class="time-and-author">
      {{ $post->created_at->diffForHumans() }}
      <span>Written By {{ $post->user->name ?? 'unknown'}}</span>
    </p>

    <div class="single-blog-post-ContentImage" data-aos="fade-left">
      <img src="{{ asset($post->image_path) }}" alt="" />
    </div>

    <div class="about-text">
      <p>
      {{ $post->body }}
      </p>
    </div>
    </section>
   
  </main>

@endsection