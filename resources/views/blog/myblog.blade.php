@extends('layout.index')


@section('main')

    <main class="container">


        @if (Session('status'))
            <p style="background-color: red;color: white;padding: 1rem;">{{ Session('status') }}</p>
        @endif
        <section class="cards-blog latest-blog">
            @if($allPosts->isEmpty())
                <p>No blog posts available.</p>
            @else
                @foreach ($allPosts as $post)
                    @if(auth()->check() && auth()->user()->id === $post->user->id)
                        <div class="card-blog-content">
                            <img src="{{ asset($post->image_path) }}" alt="Post Image" />
                            <p>
                                {{ $post->created_at->diffForHumans() }}
                                <span>Written by {{ $post->user->name ?? 'Unknown' }}</span>
                            </p>

                         
                            <div style="display: flex; justify-content: space-between; align-items: center; width: 100%;">
                                <h4 style="margin: 0;">
                                    <a href="{{ route('blog.show', ['slug' => $post->slug]) }}">{{ $post->title }}</a>
                                </h4>
                                @auth
                                    @if (auth()->check() && auth()->user()->id === $post->user->id)
                                        <div style="display: flex; gap: 10px;">
                                            <a href="{{route('blog.edit', $post)}}" class="btn btn-primary">Edit</a>
                                            <form action="{{ route('blog.delete', $post) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </div>
                                    @endif
                                @endauth
                            </div>

                        </div>
                    @endif()

                @endforeach
            @endif
        </section>

        <!-- Pagination -->
   
    </main>

@endsection