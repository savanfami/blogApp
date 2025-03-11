@extends('layout.index')

@section('main')
<main>
    @if (Session('status'))
        <p class="bg-red-500 text-white mt-10 text-center">{{ Session('status') }}</p>
    @endif

    <section class="cards-blog latest-blog">
        @if($allPosts->isEmpty())
            <p class="text-center mt-5">No blog posts available.</p>
        @else
            <div class="grid gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:gap-8 mt-10">
                @foreach ($allPosts as $post)
                    @if(auth()->check() && auth()->user()->id === $post->user->id)
                        <div class="flex flex-col overflow-hidden rounded-lg border bg-white">
                            <a href="{{ route('blog.show', ['slug' => $post->slug]) }}" class="group relative block h-48 md:h-64 overflow-hidden">
                                <img src="{{ asset($post['image_path']) }}" loading="lazy" alt="Photo" class="absolute inset-0 h-full w-full object-cover object-center transition duration-200 group-hover:scale-110" />
                            </a>

                            <div class="flex flex-1 flex-col p-4 sm:p-6">
                                <h2 class="mb-2 text-lg font-semibold text-gray-800">
                                    <a href="{{ route('blog.show', ['slug' => $post->slug]) }}" class="transition duration-100 hover:text-indigo-500 active:text-indigo-600">
                                        {{ $post->title }}
                                    </a>
                                </h2>

                                <div class="mt-auto flex items-end justify-between">
                                    <div>
                                        <span class="block text-indigo-500">{{ $post->user->name ?? 'Unknown' }}</span>
                                        <span class="block text-sm text-gray-400">{{ $post->created_at->diffForHumans() }}</span>
                                    </div>

                                    @auth
                                        @if (auth()->user()->id === $post->user->id)
                                            <div class="flex gap-2">
                                                <a href="{{ route('blog.edit', $post) }}" class="border border-black bg-gray-700 p-1 rounded-md text-white">Edit</a>
                                                <form action="{{ route('blog.delete', $post) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="border border-black bg-gray-700 p-1 rounded-md text-white">Delete</button>
                                                </form>
                                            </div>
                                        @endif
                                    @endauth
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        @endif
    </section>
</main>
@endsection
