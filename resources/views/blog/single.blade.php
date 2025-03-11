@extends('layout.index')

@section('main')
<main class="container  mx-auto px-4 py-8 max-w-4xl">
    <section class=" rounded-lg  overflow-hidden">
     
        <div class="w-full h-full overflow-hidden">
            <img 
                src="{{ asset($post->image_path) }}" 
                alt="{{ $post->title }}" 
                class="w-full h-full  transform hover:scale-105 transition duration-500"
            />
        </div>
        
      
        <div class="p-8">
            <!-- Title -->
            <h1 class="text-3xl underline md:text-4xl font-bold text-black pb-2 mb-4">
                {{ $post->title }}
            </h1>
            
          
            <div class="flex items-center  mb-6 text-sm">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>{{ $post->created_at->diffForHumans() }}</span>
                
                <span class="mx-3">•</span>
                
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
                <span>Written by {{ $post->user->name ?? 'unknown' }}</span>
            </div>
            

            <div class="prose prose-lg max-w-none text-black">
                <p class="whitespace-pre-line leading-relaxed">
                    {{ $post->body }}
                </p>
            </div>
        </div>
    </section>
</main>
@endsection