@extends('layouts.main')

@section('content')
    <div class="flex flex-col">
        <div class="min-w-0">
            <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">
                {{ $post->title }}
            </h2>
            <span class="text-xs text-blue-400">
                {{ $post->created_at->diffForHumans() }}
            </span>
            <span class="text-xs text-red-400">
                {{ $post->views }} views
            </span>
            <span class="text-xs text-green-400">
                By {{ $post->user->name }}
            </span>
        </div>
    </div>

    <div class="mt-6">
      @if (Gate::allows('update-post', $post))
        <a href="{{ route('posts.edit', ['post' => $post->id]) }}"
          class="inline-block bg-blue-200 py-2 px-4 rounded hover:bg-blue-300"
        >
          Edit Post
        </a>
      @endif
    </div>

    <div class="mt-6">
        <ul class=" list-reset flex flex-col">
            {{ $post->detail }}
        </ul>
    </div>
@endsection
