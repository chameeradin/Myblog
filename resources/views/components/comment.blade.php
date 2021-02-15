@props(['comment' => $comment])

<div class="my-1 pb-6 px-1 w-full lg:my-4 lg:px-4">


    <article class="rounded shadow">
        <header class="flex items-center justify-between leading-tight p-2 md:p-4">
            <div>
                <a class="flex items-center no-underline hover:underline text-black" href="{{route('users.posts', $comment->user)}}">
                    <img alt="Placeholder" class="block rounded-full h-8 w-8"  src="/storage/{{$comment->user->avatar}}"  onerror="this.src='/storage/posts/user.png'">
                    <p class="ml-2 text-sm">
                        {{$comment->user->name}}
                    </p>
                </a>
            </div>
            <p class="text-grey-darker text-sm">
                {{$comment->updated_at->diffForHumans()}}
            </p>
        </header>
        <body class="flex items-center justify-between leading-tight p-4 md:p-4">
            <h1 class="text-md">
                <p class="ml-4 text-gray">
                    {{$comment->comment}}
                </p>
            </h1>
        </body>
        <footer class="flex items-center justify-between leading-none p-2 md:p-4">
            <div class="flex items-center text-sm">
                @can('edit', $comment)
                    <form action="{{ route('comments.edit', $comment)}}" method="get" class="mr-1">
                        @csrf
                        <button type="submit" class="flex items-center justify-between text-green-500"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>Edit</button>
                    </form>
                @endcan
                &nbsp;
                @can('delete', $comment)
                    <form action="{{ route('comments.destroy', $comment)}}" method="post" class="mr-1">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="flex items-center justify-between text-red-500"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>Delete</button>
                    </form>
                @endcan
            </div>
        </footer>
    </article>
</div>
