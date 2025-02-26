@extends('layout.index')
@section('main')

<header class="header">
        <div class="header-text">
          <h1>UiMonk Blog</h1>
          <h4>Home of verified news...</h4>
        </div>
        <div class="overlay"></div>
      </header>

      <main class="container">
        <h2 class="header-title">Latest Blog Posts</h2>
        <section class="cards-blog latest-blog">
          <div class="card-blog-content">
            <img src="{{asset('images/1.jpg')}}" alt="" />
            <p>
              2 hours ago
              <span style="float: right">Written By UiMonk </span>
            </p>
            <h4 style="font-weight: bolder">
              <a href="single-blog.html"
                >Benefits of Getting Covid 19 Vaccination</a
              >
            </h4>
          </div>

          <div class="card-blog-content">
            <img src="{{asset('images/2.jpg')}}" alt="" />
            <p>
              23 hours ago
              <span style="float: right">Written By UiMonk </span>
            </p>
            <h4 style="font-weight: bolder">
              <a href="single-blog.html">Top 10 Music Stories Never Told</a>
            </h4>
          </div>

  

     
        </section>
      </main>

@endsection