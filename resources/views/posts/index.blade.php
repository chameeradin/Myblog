@extends('layouts.app')


@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            <h1 class="text-center mb-6 text-bold-500">Create a Post</h1>
            @if(session('status'))
                <div class="alert alert-success bg-success text-center">
                    {{ session('status') }}
                </div>
            @endif
            <form action="{{route('post')}}" enctype="multipart/form-data" method="post">

                @csrf
                <div class="mb-4">
                    <label for="title" class="sr-only">Title</label>
                    <input type="text" name="title" id="title" placeholder="Post title"
                    class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('title') border-red-500 @enderror" value="{{old('title')}}">
                    @error('title')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message}}
                        </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="image" class="sr-only">Image</label>
                    <input type="file" name="image" id="image" placeholder="Post cover image"
                    class="bg-gray-100 border-2 w-full p-4 rounded-lg">
                    <span class="items-center text-blue-400">Accepted file types: .jpg .bmp .png only</span>
                </div>

                <div class="mb-4">
                    <label for="body" class="sr-only">Body</label>
                    <textarea name="body" id="body" cols="30" rows="6" class="bg-gray-100 border-2 w-full p-4
                    rounded-lg @error('body') border-red-500 @enderror" placeholder="Post your idea...." value="{{old('body')}}"></textarea>

                    @error('body')
                        <div class="text-red-500 mt-2 text-sm">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <div class="px-4 py-2 text-right sm:px-6">
                    <button type="submit" class="inline-flex item-center bg-blue-500 text-white px-4 py-3 rounded font-medium items-right">Post</button>
                </div>

            </form>
            <hr class="mt-6">
            <div class="w-full bg-white p-6 rounded-lg">
                <h1 class="text-center my-6 text-bold-500">Your Posts</h1>
                @if($posts->count())
                    @foreach ($posts as $post)
                        <div class="my-1 pb-6 px-1 w-full lg:my-4 lg:px-4">

                            <!-- Article -->
                            <article class="overflow-hidden rounded-lg shadow-lg">

                                <a href="#">
                                    <img alt="Placeholder" class="block h-auto w-full" src="/storage/{{$post->image}}">
                                </a>

                                <header class="flex items-center justify-between leading-tight p-2 md:p-4">
                                    <h1 class="text-lg">
                                        <a class="no-underline hover:underline text-black" href="#">
                                            {{$post->title}}
                                        </a>
                                    </h1>
                                    <p class="text-grey-darker text-sm">
                                        {{$post->updated_at}}
                                    </p>
                                </header>

                                <body class="flex items-center justify-between leading-tight p-4 md:p-4">
                                    <h1 class="text-md">
                                        <p class="ml-4 text-gray" href="#">
                                            {{$post->body}}
                                        </p>
                                    </h1>
                                </body>

                                <footer class="flex items-center justify-between leading-none p-2 md:p-4">
                                    <a class="flex items-center no-underline hover:underline text-black" href="#">
                                        <img alt="Placeholder" class="block rounded-full" src="{{$post->image}}">
                                        <p class="ml-2 text-sm">
                                            {{auth()->user()->name}}
                                        </p>
                                    </a>
                                    <a class="no-underline text-grey-darker hover:text-red-dark" href="#">
                                        <span class="hidden">Like</span><span class="hidden">Unlike</span>
                                        <i class="fa fa-heart"></i>
                                    </a>
                                </footer>

                            </article>
                            <!-- END Article -->

                        </div>
                    @endforeach

                @else

                    <p> Thare are no posts</p>
                @endif
            </div>
        </div>

    </div>
@endsection
