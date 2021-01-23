@extends('layouts.app')


@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            <h1 class="text-center text-2xl font-medium mb-6 text-bold-500">{{$user->name}}'s Posts</h1>
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
