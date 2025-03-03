@extends('layout.index')


@section('main')

  <main class="container">
    <div class="searchbar">
    <form action="">
      <input type="text" placeholder="Search..." name="search" />
      <button type="submit">
      <i class="fa fa-search"></i>
      </button>
    </form>
    </div>
    <div class="categories">
    <ul>
      <li><a href="">Health</a></li>
      <li><a href="">Entertainment</a></li>
      <li><a href="">Sports</a></li>
      <li><a href="">Nature</a></li>
    </ul>
    </div>
    @if (Session('status'))
    <p style="background-color: red;color: white;padding: 1rem;">{{ Session('status') }}</p>
  @endif
    <section class="cards-blog latest-blog">
    @if($allPosts->isEmpty())
    <p>No blog posts available.</p>
  @else
  @foreach ($allPosts as $post)
    <div class="card-blog-content">
    <img src="{{ asset($post->image_path) }}" alt="Post Image" />
    <p>
    {{ $post->created_at->diffForHumans() }}
    <span>Written by {{ $post->user->name ?? 'Unknown' }}</span>
    </p>

    <!-- Wrap title and buttons in a flex container -->
    <div style="display: flex; justify-content: space-between; align-items: center; width: 100%;">
    <h4 style="margin: 0;">
    <a href="{{ route('blog.show', ['slug' => $post->slug]) }}">{{ $post->title }}</a>
    </h4>
    @auth
    @if (auth()->check() && auth()->user()->id === $post->user->id)
    <div style="display: flex; gap: 10px;">
    <a href="{{route('blog.edit', $post)}}" class="btn btn-primary">Edit</a>
    <form action="{{ route('blog.delete', $post) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">Delete</button>
    </form>
    </div>
  @endif
  @endauth
    </div>
    </div>
  @endforeach
@endif
    </section>

  </main>
  <div style="margin:0 auto;width: 100%;display: flex;align-items: center;justify-content: center;">
        {{ $allPosts->links('pagination::default') }}
    </div>

@endsection