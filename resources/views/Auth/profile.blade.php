@extends('layouts.app')


@section('content')

        <div class="mx-auto container max-w-2xl md:w-3/4 shadow-md">
            <h1 class="text-2xl text-center">Profile</h1>
            <div class="bg-gray-100 p-4 border-t-2 bg-opacity-5 border-indigo-400 rounded-t">
                <form action="{{route('profile.update', $user->id)}}" enctype="multipart/form-data" method="post">
                    @csrf
                    <div class="max-w-sm mx-auto md:w-full md:mx-0">
                        <div class="inline-flex items-center space-x-4">
                        <img
                            class="w-12 h-12 object-cover rounded-full"
                            alt="User avatar"
                            src="/storage/{{$user->avatar}}"
                            onerror="this.src='/storage/posts/user.png'"
                        />

                        <h1 class="text-gray-600">{{$user->name}}</h1>
                        </div>
                    </div>
                    </div>
                    <div class="bg-white space-y-6">
                    <div class="md:inline-flex space-y-4 md:space-y-0 w-full p-4 text-gray-500 items-center">
                        <h2 class="md:w-1/3 max-w-sm mx-auto">Account</h2>
                        <div class="md:w-2/3 max-w-sm mx-auto">
                        <label class="text-sm text-gray-400" name="email">Email</label>
                        <div class="w-full inline-flex border">
                            <div class="pt-2 w-1/12 bg-gray-100 bg-opacity-50">
                            <svg
                                fill="none"
                                class="w-6 text-gray-400 mx-auto"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                            >
                                <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"
                                />
                            </svg>
                            </div>
                            <input
                            type="email"
                            name="email"
                            id="email"
                            class="w-11/12 @error('email') border-red-500 @enderror focus:text-gray-600 p-2"
                            placeholder="{{$user->email}}"
                            value="{{old('email')}}"
                            />
                        </div>
                        @error('email')
                            <div class="text-red-500 mt-2 text-sm">
                                {{ $message}}
                            </div>
                        @enderror
                        </div>
                    </div>

                    <hr />
                    <div class="md:inline-flex  space-y-4 md:space-y-0  w-full p-4 text-gray-500 items-center">
                        <h2 class="md:w-1/3 mx-auto max-w-sm">Personal info</h2>
                        <div class="md:w-2/3 mx-auto max-w-sm space-y-5">
                        <div>
                            <label class="text-sm text-gray-400" name="name">Full name</label>
                            <div class="w-full inline-flex border">
                            <div class="w-1/12 pt-2 bg-gray-100">
                                <svg
                                fill="none"
                                class="w-6 text-gray-400 mx-auto"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
                                />
                                </svg>
                            </div>
                            <input
                                type="text"
                                name="name"
                                id="name"
                                class="w-11/12 @error('name') border-red-500 @enderror focus:text-gray-600 p-2"
                                placeholder="{{$user->name}}"
                                value="{{old('name')}}"
                            />
                            </div>
                            @error('name')
                                <div class="text-red-500 mt-2 text-sm">
                                    {{ $message}}
                                </div>
                            @enderror
                        </div>
                        <div>
                            <label class="text-sm text-gray-400" name="username">Username</label>
                            <div class="w-full inline-flex border">
                            <div class="w-1/12 pt-2 bg-gray-100">
                                <svg
                                fill="none"
                                class="w-6 text-gray-400 mx-auto"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
                                />
                                </svg>
                            </div>
                            <input
                                type="text"
                                name="username"
                                id="username"
                                class="w-11/12 @error('username') border-red-500 @enderror focus:text-gray-600 p-2"
                                placeholder="{{$user->username}}"
                                value="{{old('username')}}"
                            />
                            </div>
                            @error('username')
                                <div class="text-red-500 mt-2 text-sm">
                                    {{ $message}}
                                </div>
                            @enderror
                        </div>
                        <div>
                            <label class="text-sm text-gray-400" name="phone">Phone number</label>
                            <div class="w-full inline-flex border">
                            <div class="pt-2 w-1/12 bg-gray-100">
                                <svg
                                fill="none"
                                class="w-6 text-gray-400 mx-auto"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"
                                />
                                </svg>
                            </div>
                            <input
                                type="text"
                                name="phone"
                                id="phone"
                                class="w-11/12 @error('phone') border-red-500 @enderror focus:text-gray-600 p-2"
                                placeholder="{{$user->phone}}"
                                value="{{old('phone')}}"
                            />
                            </div>
                            @error('phone')
                                <div class="text-red-500 mt-2 text-sm">
                                    {{ $message}}
                                </div>
                            @enderror
                        </div>
                        <div>
                            <label class="text-sm text-gray-400" name="avatar">Avatar</label>
                            <div class="w-full inline-flex border">
                            <div class="pt-2 w-1/12 bg-gray-100">
                                <svg
                                fill="none"
                                class="w-6 text-gray-400 mx-auto"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
                                />
                                </svg>
                            </div>
                            <input
                                type="file"
                                name="avatar"
                                id="avatar"
                                class="w-11/12 @error('avatar') border-red-500 @enderror focus:text-gray-600 p-2 ml-4"
                                value="{{old('avatar')}}"
                            />
                            </div>
                            @error('avatar')
                                <div class="text-red-500 mt-2 text-sm">
                                    {{ $message}}
                                </div>
                            @enderror
                            <span class="items-center text-blue-400">Accepted file types: .jpg .bmp .png only</span>
                        </div>
                        </div>
                    </div>

                    <hr />
                    <div class="md:inline-flex w-full space-y-4 md:space-y-0 p-8 text-gray-500 items-center">
                        <h2 class="md:w-4/12 max-w-sm mx-auto">Change password</h2>

                        <div class="md:w-2/3 w-full md:pl-9 max-w-sm mx-auto space-y-5 md:inline-flex pl-2">
                        <div>
                            <div class="w-full inline-flex border-b">
                                <div class="pt-2 w-1/12 bg-gray-100">
                                <svg
                                    fill="none"
                                    class="w-6 text-gray-400 mx-auto"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                >
                                    <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"
                                    />
                                </svg>
                                </div>
                                <input
                                type="password"
                                name="password"
                                id="password"
                                class="w-11/12 @error('password') border-red-500 @enderror focus:text-gray-600 p-2 ml-4"
                                placeholder="New Password"
                                />
                            </div>
                            @error('password')
                                <div class="text-red-500 mt-2 text-sm">
                                    {{ $message}}
                                </div>
                            @enderror
                            <div class="w-full inline-flex border-b">
                                <div class="pt-2 w-1/12 bg-gray-100">
                                <svg
                                    fill="none"
                                    class="w-6 text-gray-400 mx-auto"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                >
                                    <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"
                                    />
                                </svg>
                                </div>
                                <input
                                type="password"
                                name="password_confirmation"
                                id="password_confirmation"
                                class="w-11/12 focus:outline-none focus:text-gray-600 p-2 ml-4"
                                placeholder="New"
                                />
                            </div>
                        </div>

                        </div>

                        <div class="md:w-3/12 text-center md:pl-6">
                        <button type="submit" class="text-white mx-auto max-w-sm rounded-md text-center bg-indigo-400 px-4 py-2 inline-flex items-center focus:outline-none md:w-full">
                            Update
                        </button>
                        </div>
                    </div>
                </form>
            <hr />
            <div class="w-full p-4 text-right text-gray-500">
                <button class="inline-flex items-center focus:outline-none mr-4">
                <svg
                    fill="none"
                    class="w-4 mr-2"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                >
                    <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"
                    />
                </svg>
                Delete account
                </button>
            </div>
            </div>
        </div>
@endsection
