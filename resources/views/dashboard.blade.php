@extends('layouts.app')


@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            Dashboard
            @if(session('status'))
                <div class="alert alert-success bg-success text-center">
                    {{ session('status') }}
                </div>
            @endif
        </div>

    </div>
@endsection
