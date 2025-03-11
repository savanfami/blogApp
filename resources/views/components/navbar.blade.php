<nav class="flex justify-between items-center px-8 py-4 bg-gray-800 shadow-sm font-serif">
    <!-- Left: Title -->
    <div class="font-bold text-xl">
        <a class="text-white hover:text-gray-300">BloG</a>
    </div>
    
    <!-- Center: Navigation items -->
    <div class="flex space-x-8">
        <a href="{{ route('home.index') }}" class="text-white hover:text-gray-300 {{ request()->routeIs('home.index') ? 'border-b-2 border-white' : '' }}">
            Home
        </a>
        <a href="{{ route('blog.index') }}" class="text-white hover:text-gray-300 {{ request()->routeIs('blog.index') ? 'border-b-2 border-white' : '' }}">
            Blog
        </a>
        
        @auth
            <a href="{{ route('blog.myblog') }}" class="text-white hover:text-gray-300 {{ request()->routeIs('blog.myblog') ? 'border-b-2 border-white' : '' }}">
                My Blogs
            </a>
        @endauth
    </div>
    
    <!-- Right: Authentication links -->
    <div class="flex space-x-4">
        @guest
            <a href="{{ route('login') }}" class="px-4 py-2 text-sm font-semibold text-white bg-gray-800 rounded border border-white {{ request()->routeIs('login') ? 'bg-gray-700' : '' }}">
                Login
            </a>
            <a href="{{ route('register') }}" class="px-4 py-2 text-sm font-semibold text-white bg-gray-800 rounded border border-white {{ request()->routeIs('register') ? 'bg-gray-700' : '' }}">
                Sign Up
            </a>
        @endguest
        @auth
            <a href="{{ route('home') }}" class="text-white hover:text-gray-300 {{ request()->routeIs('home') ? 'border-b-2 border-white' : '' }}">
                Dashboard
            </a>
        @endauth
    </div>
</nav>
