@extends('layouts.app')


@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            <h1 class="text-center mb-6 text-bold-500">Edit your post</h1>
            <form action="{{route('posts.update', $post->id)}}" enctype="multipart/form-data" method="post">
                @csrf
                <div class="mb-4">
                    <label for="title" class="sr-only">Title</label>
                    <input type="text" name="title" id="title" placeholder="{{$post->title}}"
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
                    <img src="/storage/{{$post->image}}" class="block h-auto w-full" alt="post image" onerror="this.src='/storage/posts/picture.png'">
                </div>

                <div class="mb-4">
                    <label for="body" class="sr-only">Body</label>
                    <textarea name="body" id="body" cols="30" rows="6" class="bg-gray-100 border-2 w-full p-4
                    rounded-lg @error('body') border-red-500 @enderror" placeholder="{{$post->body}}" value="{{old('body')}}"></textarea>

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
        </div>
    </div>
@endsection
