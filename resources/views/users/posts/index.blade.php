@extends('layouts.app')


@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            <h1 class="text-2xl font-medium mb-6 text-bold-500"><span class="text-blue-500">{{$user->name}}'s</span> Posts</h1>
            <p>Posted {{$posts->count()}} {{Str::plural('post', $posts->count())}}</p>

<hr>

            @if($posts->count())
                @foreach ($posts as $post)
                    <x-post :post="$post" />
                @endforeach
                    {{$posts->links()}}
            @else

                <p> {{$user->name}} dose not have any posts</p>
            @endif
        </div>

    </div>
@endsection
