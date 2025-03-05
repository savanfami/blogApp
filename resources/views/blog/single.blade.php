@extends('layout.index')
@section('main')


  <main class="container">
    <section class="single-blog-post">
    <h1 style="color: white;text-decoration: underline;">{{ $post->title }}</h1>

    <p style="color: white;" class="time-and-author">
      {{ $post->created_at->diffForHumans() }}
      <span style="color: white;">Written By {{ $post->user->name ?? 'unknown'}}</span>
    </p>

    <div class="single-blog-post-ContentImage" data-aos="fade-left">
      <img src="{{ asset($post->image_path) }}" alt="" />
    </div>

    <div class="about-text">
      <p style="color: white;">
      {{ $post->body }}
      </p>
    </div>
    </section>
   
  </main>

@endsection