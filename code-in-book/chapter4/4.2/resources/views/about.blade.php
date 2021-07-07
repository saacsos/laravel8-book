@extends('layouts.main')

@section('content')
    <div class="lg:flex lg:items-center lg:justify-between">
        <div class="flex-1 min-w-0">
            <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">
                About us
            </h2>
        </div>
    </div>
    <div>
        <p>My App is Demo App</p>
    </div>

    <div class="p-10">
        <!--Card 1-->
        <div class=" w-full lg:max-w-full lg:flex">
            <div class="h-48 lg:h-auto lg:w-48 flex-none bg-cover rounded-t lg:rounded-t-none lg:rounded-l text-center overflow-hidden" style="background-image: url('https://loremflickr.com/320/240/mountain')" title="Mountain">
            </div>
            <div class="border-r border-b border-l border-gray-400 lg:border-l-0 lg:border-t lg:border-gray-400 bg-white rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal">
                <div class="mb-8">
                    <p class="text-sm text-gray-600 flex items-center">
                        <svg class="fill-current text-gray-500 w-3 h-3 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M4 8V6a6 6 0 1 1 12 0v2h1a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-8c0-1.1.9-2 2-2h1zm5 6.73V17h2v-2.27a2 2 0 1 0-2 0zM7 6v2h6V6a3 3 0 0 0-6 0z" />
                        </svg>
                        Developer
                    </p>
                    <div class="text-gray-900 font-bold text-xl mb-2">Best Tech 2020</div>
                    <p class="text-gray-700 text-base">Quiet during the day. Quite LOUD at night!</p>
                </div>
                <div class="flex items-center">
                    <img class="w-10 h-10 rounded-full mr-4" src="https://randomuser.me/api/portraits/thumb/lego/5.jpg" alt="Avatar of Writer">
                    <div class="text-sm">
                        <p class="text-gray-900 leading-none">{{ $name }} ({{ $info['email'] }})</p>
                        <p class="text-gray-600">{!! $info['address'] !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
