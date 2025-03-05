<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Blog App</title>
  <link rel="stylesheet" href="/style.css" />
  @yield('stylesheet')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
  <div id="wrapper">
    <div class="sidebar">
      <span class="closeButton">&times;</span>
      <p class="brand-title"><a href=""> </a></p>
      <div class="side-links">
        <ul>
          <li><a class="{{ request()->routeIs('home.index') ? 'active' : '' }}"
              href="{{ route('home.index') }}">Home</a></li>
              <li><a class="{{ request()->routeIs('blog.index') ? 'active' : '' }}"
                  href="{{ route('blog.index') }}">Blog</a></li>
              @auth
        <li><a class="{{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Dashboard</a></li>
        <li><a class="{{ request()->routeIs('blog.myblog') ? 'active' : '' }}" href="{{ route('blog.myblog') }}">My
          Blogs</a></li>
      @endauth
          @guest
        <li><a class="{{ request()->routeIs('login') ? 'active' : '' }}" href="{{ route('login') }}">Login</a></li>
        <li><a class="{{ request()->routeIs('register') ? 'active' : '' }}"
          href="{{ route('register') }}">Register</a></li>
      @endguest
        </ul>
      </div>
    </div>


    @yield('main')



  </div>

  <script>
    document
      .querySelector(".menuButton")
      .addEventListener("click", function () {
        document.querySelector(".sidebar").style.width = "100%";
        document.querySelector(".sidebar").style.zIndex = "5";
      });

    document
      .querySelector(".closeButton")
      .addEventListener("click", function () {
        document.querySelector(".sidebar").style.width = "0";
      });

  </script>
</body>

</html>