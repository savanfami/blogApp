@extends('layout.index')


@section('main')

  <main class="container total-blog " >
    <div class="searchbar mt-5">
    <form action="">
    
    </form>
    </div>
    <div class="categories">
    <div class="flex justify-center  items-center">
  <ul class="flex gap-2">
    @foreach ($allcategory as $cat)
      <li>
        <a class="bg-gray-600 p-2 pb-3 rounded-md text-white" href="{{ route('blog.index', ['category' => $cat->name]) }}">
          {{ $cat->name }}
        </a>
      </li>
    @endforeach
  </ul>
</div>
    </div>
    @if (Session('status'))
    <p style="background-color: red;color: white;padding: 1rem;">{{ Session('status') }}</p>
  @endif
    <section class="cards-blog latest-blog">
    @if($allPosts->isEmpty())
    <p style="color: white;">No blog posts available.</p>
  @else
  <div class="grid gap-4 sm:grid-cols-2 md:gap-6 lg:grid-cols-3 xl:grid-cols-4 xl:gap-8">
     
     @foreach ($allPosts as $post)
     <div class="flex flex-col mt-10 overflow-hidden rounded-lg border bg-white">
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
@endif
    </section>

  </main>
  <div style="margin:0 auto;width: 100%;display: flex;align-items: center;justify-content: center;">
    {{ $allPosts->links('pagination::default') }}
  </div>

@endsection






