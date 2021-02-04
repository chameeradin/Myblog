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
    </article>
</div>
