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
        </div>
    </div>

    <div class="mt-6">
        <ul class=" list-reset flex flex-col">
            {{ $post->detail }}
        </ul>
    </div>
@endsection
