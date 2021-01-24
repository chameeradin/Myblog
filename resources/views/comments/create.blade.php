@extends('layouts.app')


@section('content')
    <div class="flex justify-center">

        <div class="w-8/12 bg-white p-6 rounded-lg">
            <h1 class="text-center mb-6 text-bold-500">Comment</h1>
            <div class="my-1 pb-6 px-1 w-full lg:my-4 lg:px-4">

                <!-- Article -->
                <article class="overflow-hidden rounded-lg shadow-lg">

                    <a href="#">
                        <img alt="Placeholder" class="block h-auto w-full" src="/storage/{{$post->image}}" onerror="this.src='/storage/posts/picture.png'">
                    </a>

                    <header class="flex items-center justify-between leading-tight p-2 md:p-4">
                        <h1 class="text-lg">
                            <a class="no-underline hover:underline text-black" href="{{ route('posts.show', $post)}}">
                                {{$post->title}}
                            </a>
                        </h1>
                        <p class="text-grey-darker text-sm">
                            {{$post->updated_at->diffForHumans()}}
                        </p>
                    </header>

                    <body class="flex items-center justify-between leading-tight p-4 md:p-4">
                        <h1 class="text-md">
                            <p class="ml-4 text-gray">
                                {{$post->body}}
                            </p>
                        </h1>
                    </body>

                    <footer class="flex items-center justify-between leading-none p-2 md:p-4">
                        <div>
                            <a class="flex items-center no-underline hover:underline text-black" href="{{route('users.posts', $post->user)}}">
                                <img alt="Placeholder" class="block rounded-full h-8 w-8"  src="{{$post->image}}"  onerror="this.src='/storage/posts/user.png'">
                                <p class="ml-2 text-sm">
                                    {{$post->user->name}}
                                </p>
                            </a>
                        </div>
                        <div>
                            <div class="flex items-center text-sm">
                                @if (!$post->likedBy(auth()->user()))
                                    <form action="{{route('posts.likes', $post)}}" method="post" class="mr-1">
                                        @csrf
                                        <button type="submit" class="flex items-center justify-between text-blue-500"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5" />
                                            </svg>Like</button>
                                    </form>
                                @else
                                    <form action="{{route('posts.likes', $post)}}" method="post" class="mr-1">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="flex items-center justify-between text-blue-500"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14H5.236a2 2 0 01-1.789-2.894l3.5-7A2 2 0 018.736 3h4.018a2 2 0 01.485.06l3.76.94m-7 10v5a2 2 0 002 2h.096c.5 0 .905-.405.905-.904 0-.715.211-1.413.608-2.008L17 13V4m-7 10h2m5-10h2a2 2 0 012 2v6a2 2 0 01-2 2h-2.5" />
                                            </svg>Unlike</button>
                                    </form>
                                @endif
                                    &nbsp;
                                <span>{{ $post->likes->count()}} {{ Str::plural('Like', $post->likes->count())}}</span>
                            </div>
                        </div>

                        <div>
                            <div class="flex items-center text-sm">
                                <form action="{{ route('posts.comments.create', $post)}}" method="get" class="mr-1">
                                    @csrf
                                    <button type="submit" class="flex items-center justify-between"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                                    </svg>Comments</button>
                                </form>
                            </div>
                        </div>
                    </footer>

                </article>

            </div>
        </div>

    </div>
@endsection
