<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Contact UiMonk - UiMonk Blog</title>
  <!-- Css -->
  <link rel="stylesheet" href="style.css" />
  <!-- Font awesome -->
  <!-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
</head>

<body>
  <div id="wrapper">
    <!-- sidebar -->
    <div class="sidebar">
      <span class="closeButton">&times;</span>
      <p class="brand-title"><a href="">UiMonk Blog</a></p>

      <div class="side-links">
        <ul>
          <li><a class="{{ request()->routeIs('home.index') ? 'active' : '' }}"
              href="{{ route('home.index') }}">Home</a></li>
          <li><a class="{{ request()->routeIs('blog.index') ? 'active' : '' }}"
              href="{{ route('blog.index') }}">Blog</a></li>
          <li><a class="{{ request()->routeIs('home.about') ? 'active' : '' }}"
              href="{{ route('home.about') }}">About</a></li>
          <li><a class="{{ request()->routeIs('contact.index') ? 'active' : '' }}"
              href="{{ route('contact.index') }}">Contact</a></li>

        </ul>
      </div>
      <!-- sidebar footer -->
      <footer class="sidebar-footer">
        <div>
          <a href=""><i class="fab fa-facebook-f"></i></a>
          <a href=""><i class="fab fa-instagram"></i></a>
          <a href=""><i class="fab fa-twitter"></i></a>
        </div>

        <small>&copy 2024 UiMonk Blog</small>
      </footer>
    </div>
    <!-- Menu Button -->
    <div class="menuButton">
      <div class="bar"></div>
      <div class="bar"></div>
      <div class="bar"></div>
    </div>
    <!-- main -->

    @yield('main')

    <!-- Main footer -->
    <footer class="main-footer">
      <div>
        <a href=""><i class="fab fa-facebook-f"></i></a>
        <a href=""><i class="fab fa-instagram"></i></a>
        <a href=""><i class="fab fa-twitter"></i></a>
      </div>
      <small>&copy 2024 UiMonk Blog</small>
    </footer>
  </div>

  <!-- Click events to menu and close buttons using javaascript-->
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

    // setTimeout(() => {alert('Welcome')}, 500);
  </script>
</body>

</html>