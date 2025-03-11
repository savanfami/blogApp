@extends('layout.index')

@section('main')
<div class=" min-h-screen">
    <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
        <!-- Welcome Card -->
        <div class="bg-white rounded-lg shadow-lg overflow-hidden mb-8">
            <div class="bg-gradient-to-r bg-gray-500 p-6">
                <div class="flex items-center justify-between">
                    <div>
                        @auth
                            <h2 class="text-2xl font-bold text-white">Welcome, {{ Auth::user()->name }}</h2>
                            <p class="text-blue-100 mt-1">What would you like to do today?</p>
                        @else
                            <h2 class="text-2xl font-bold text-white">Welcome, Guest!</h2>
                            <p class="text-blue-100 mt-1">Please log in to access all features</p>
                        @endauth
                    </div>
                    @auth
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-md shadow-sm  ">
                                Logout
                            </button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="px-4 py-2 bg-white text-indigo-600 rounded-md shadow-sm hover:bg-gray-50 transition-colors duration-200">
                            Login
                        </a>
                    @endauth
                </div>
            </div>
        </div>

        <!-- Menu Options -->
        @auth
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <a href="{{ route('blog.create') }}" class="block">
                    <div class="bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300 overflow-hidden">
                        <div class="p-6">
                            <div class="bg-blue-100 inline-block p-3 rounded-full mb-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                            </div>
                            <h3 class="text-xl font-semibold text-gray-800">Create Post</h3>
                            <p class="mt-2 text-gray-600">Write a new blog post to share with your audience</p>
                        </div>
                    </div>
                </a>

                <a href="{{ route('categories.create') }}" class="block">
                    <div class="bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300 overflow-hidden">
                        <div class="p-6">
                            <div class="bg-green-100 inline-block p-3 rounded-full mb-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <h3 class="text-xl font-semibold text-gray-800">Create Category</h3>
                            <p class="mt-2 text-gray-600">Add a new category to organize your blog posts</p>
                        </div>
                    </div>
                </a>

                <a href="{{ route('categories.index') }}" class="block">
                    <div class="bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300 overflow-hidden">
                        <div class="p-6">
                            <div class="bg-purple-100 inline-block p-3 rounded-full mb-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                                </svg>
                            </div>
                            <h3 class="text-xl font-semibold text-gray-800">List Categories</h3>
                            <p class="mt-2 text-gray-600">View and manage all your blog categories</p>
                        </div>
                    </div>
                </a>
            </div>
        @else
            <div class="bg-white rounded-lg shadow p-6 text-center">
                <p class="text-gray-600">Please log in to create posts and manage categories</p>
            </div>
        @endauth
    </div>
</div>
@endsection