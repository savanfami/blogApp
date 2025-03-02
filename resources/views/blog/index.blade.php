@extends('layout.index')
@section('main')

<main class="container">
      <h2 class="header-title">All Blog Posts</h2>
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
      <section class="cards-blog latest-blog">
      @if($allPosts->isEmpty())
    <p>No blog posts available.</p>
@else
    @foreach ($allPosts as $post )
        <div class="card-blog-content">
            <img src="{{ asset($post->image_path) }}" alt="Post Image" />
            <p>
                {{ $post->created_at->diffForHumans() }}
                <span>Written by {{ $post->user->name ?? 'Unknown' }}</span>
            </p>
            <h4>
                <a href="{{ route('blog.show', $post) }}">{{ $post->title }}</a>
            </h4>
        </div>
    @endforeach
@endif

   
       
     

        <!-- pagination -->
        <div class="pagination" id="pagination">
          <a href="">&laquo;</a>
          <a class="active" href="">1</a>
          <a href="">2</a>
          <a href="">3</a>
          <a href="">4</a>
          <a href="">5</a>
          <a href="">&raquo;</a>
        </div>
      </section>

      <!-- Main footer -->
      <footer class="main-footer">
        <div>
          <a href=""><i class="fab fa-facebook-f"></i></a>
          <a href=""><i class="fab fa-instagram"></i></a>
          <a href=""><i class="fab fa-twitter"></i></a>
        </div>
     
      </footer>
    </main>

@endsection