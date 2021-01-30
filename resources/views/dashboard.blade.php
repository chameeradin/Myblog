@extends('layouts.app')


@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            Dashboard
            @if (session('status'))
            <div class="bg-green-400 p-4 rounded-lg mb-6 text-white text-center">
                {{session('status')}}
            </div>
            @endif
        </div>

    </div>
@endsection
