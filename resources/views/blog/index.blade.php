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
        <div class="card-blog-content">
          <img src="{{asset('images/1.jpg')}}" alt="" />
          <p>
            2 hours ago
            <span>Written By UiMonk </span>
          </p>
          <h4>
            <a href="{{route('blog.show')}}">Mumbai Hits 32Deg summer</a>
          </h4>
        </div>

        <div class="card-blog-content">
          <img src="{{asset('images/2.jpg')}}" alt="" />
          <p>
            23 hours ago
            <span>Written By UiMonk </span>
          </p>
          <h4 style="font-weight: bolder">
            <a href="{{route('blog.show')}}">India KicksOff IPL 16</a>
          </h4>
        </div>

       
     

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