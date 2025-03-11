@extends('layout.index')
@section('main')



<div>
  <img class='w-full h-screen' src="https://www.theedublogger.com/files/2019/03/10-Minute-Weekly-Blogging-Plan-tasqn3-prizg4.jpeg" alt="">
</div>



<div class="bg-white py-6 sm:py-8 lg:py-12">


  <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
  
    <div class="mb-10 md:mb-16">
      <h2 class="mb-4 text-center text-2xl font-bold text-gray-800 md:mb-6 lg:text-3xl font-serif underline">Latest Blogs</h2>

    </div>


    <div class="grid gap-4 sm:grid-cols-2 md:gap-6 lg:grid-cols-3 xl:grid-cols-4 xl:gap-8">
     
      @foreach ($allPosts as $post)
      <div class="flex flex-col overflow-hidden rounded-lg border bg-white">
        <a href="{{ route('blog.show', ['slug' => $post->slug]) }}" class="group relative block h-48 overflow-hidden  md:h-64">
          <img src="{{ asset($post['image_path']) }}" loading="lazy" alt="Photo by Minh Pham" class="absolute inset-0 h-full w-full object-cover object-center transition duration-200 group-hover:scale-110" />
        </a>

        <div class="flex flex-1 flex-col p-4 sm:p-6">
          <h2 class="mb-2 text-lg font-semibold text-gray-800">
            <a  href="{{ route('blog.show', ['slug' => $post->slug]) }}" class="transition duration-100 hover:text-indigo-500 active:text-indigo-600">{{ $post->title }}</a>
          </h2>


          <div class="mt-auto flex items-end justify-between">
            <div class="flex items-center gap-2">

              <div>
                <span class="block text-indigo-500"{{ $post->user->name ?? 'Unknown' }}</span>
                <span class="block text-sm text-gray-400"> {{ $post->created_at->diffForHumans() }}</span>
              </div>
            </div>

          </div>
        </div>
      </div>
      @endforeach

    </div>
  </div>
</div>

@endsection