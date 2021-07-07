@extends('layouts.main')

@section('content')
  <div class="flex flex-col">
    <div class="min-w-0">
      <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">
        Edit Post
      </h2>
    </div>

    @if ($errors->any())
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
      <ul>
        @foreach ($errors->all() as $error)
          <li>
            <span class="block sm:inline">{{ $error }}</span>
          </li>
        @endforeach
      </ul>
    </div>
    @endif

    <div class="mt-6 w-full max-w-xl">
      <form action="{{ route('posts.update', ['post' => $post->id]) }}" method="post">
        @csrf
        @method('PUT')
        <div class="mb-4">
          <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
            Post Title
          </label>
<input class="shadow appearance-none border rounded w-full py-2 px-3
    @error('title') border-red-500 @enderror
    text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
   autocomplete="off" id="title" type="text"
   placeholder="Post Title ..." name="title"
   value="{{ old('title', $post->title) }}"
>
@error('title')
  <div class="text-red-500 text-sm">
    {{ $message }}
  </div>
@enderror
        </div>

        <div class="mb-4">
          <label class="block text-gray-700 text-sm font-bold mb-2" for="detail">
            Post Detail
          </label>
          <textarea class="shadow appearance-none border rounded w-full py-2 px-3
            text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
              id="detail" rows="10" name="detail">{{ $post->detail }}</textarea>
        </div>

        <div class="flex items-center justify-between">
          <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold
            py-2 px-4 rounded focus:outline-none focus:shadow-outline"
              type="submit">Update
          </button>
        </div>
      </form>
    </div>
  </div>
@endsection
