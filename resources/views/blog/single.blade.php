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
    <section class="recommended">
    <p>Related</p>
    <div class="recommended-cards">

      <a href="">
      <div class="recommended-card">
        <img src="images/pic2.jpg" alt="" loading="lazy" />
        <h4>
        India KicksOff IPL 16
        </h4>
      </div>
      </a>


    </div>
    </section>
  </main>

@endsection