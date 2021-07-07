@extends('layouts.main')

@section('content')
    <div class="flex flex-col">
        <div class="min-w-0">
            <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">
                All posts
            </h2>
        </div>
    </div>

    <div class="mt-6">
      @if (Gate::allows('create-post', \App\Models\Post::class))
        <a href="{{ route('posts.create') }}"
           class="inline-block bg-blue-200 py-2 px-4 rounded hover:bg-blue-300"
        >
          เพิ่มโพสต์ใหม่
        </a>
      @endif
    </div>

    <div class="mt-6">
        <ul class=" list-reset flex flex-col">
            @foreach ($posts as $post)
                <li class="relative -mb-px block border p-4 border-grey">
                    <p class="text-xl">
                        <a href="{{ route('posts.show', ['post' => $post->id]) }}">
                            {{ $post->title }}
                        </a>
                    </p>
                    <span class="text-xs text-blue-400">
                        {{ $post->views }} views
                    </span>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
