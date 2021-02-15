@extends('layouts.app')


@section('content')
    <div class="flex justify-center">
        <div class="lg:w-8/12  bg-white p-6 rounded-lg">
            <div class="bg-white p-6 rounded-lg">
                <h1 class="text-center mb-6 text-bold-500">Edit a comment</h1>
                <form action="{{route('comments.update', $comment->id)}}" method="post">
                    @csrf
                    <div class="mb-4">
                        <label for="comment" class="sr-only">Comment</label>
                        <input type="text" name="comment" id="comment" placeholder="{{$comment->comment}}"
                        class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('comment') border-red-500 @enderror" value="{{old('comment')}}">
                        @error('comment')
                            <div class="text-red-500 mt-2 text-sm">
                                {{ $message}}
                            </div>
                        @enderror
                    </div>
                    <div class="px-4 py-2 text-right sm:px-6">
                        <button type="submit" class="inline-flex item-center bg-blue-500 text-white px-4 py-3 rounded font-medium items-right">Upadte</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
