@extends('layouts.app')


@section('content')
    <div class="flex justify-center">
        <div class="lg:w-8/12 bg-white p-6 rounded-lg">
            <h1 class="text-center mb-6 text-2xl font-medium">Posts</h1>
            @if (session('status'))
                <div class="bg-green-400 p-4 rounded-lg mb-6 text-white text-center">
                    {{session('status')}}
                </div>
            @elseif(session('alert'))
                <div class="bg-red-500 p-4 rounded-lg mb-6 text-white text-center">
                    {{session('alert')}}
                </div>
            @endif
            <a href="{{route('create')}}" type="button" class="bg-gradient-to-r from-pink-500 to-yellow-500 hover:from-green-400 hover:to-blue-500 flex inline fixed z-0 top-60 right-80 text-white font-bold py-3 px-4 rounded-full">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-feather"><path d="M20.24 12.24a6 6 0 0 0-8.49-8.49L5 10.5V19h8.5z"></path>
                    <line x1="16" y1="8" x2="2" y2="22"></line><line x1="17.5" y1="15" x2="9" y2="15"></line></svg>
                    &nbsp;Create Post
            </a>
            @if($posts->count())
                @foreach ($posts as $post)
                    <x-post :post="$post" />
                @endforeach
                    {{$posts->links()}}
            @else

                <p> Thare are no posts</p>
            @endif
        </div>
    </div>
@endsection
