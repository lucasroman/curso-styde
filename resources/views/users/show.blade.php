
@extends('layout')

@section('title', "User {$user->id} - ")

@section('content')
    <h1>
        <span class="badge badge-dark">{{ __('messages.user') }} {{ $user->id }}</span>
    </h1>

    <p>{{ __('messages.name') }}: <b>{{ $user->name }}</b></p>
    <p>{{ __('messages.email') }}: <b>{{ $user->email }}</b></p>
    <p>{{ __('messages.profession') }}: <b>{{ $user->profession->title }}</b></p>

    <p>
        <a href="{{ route('users.index') }}">
            <button class="btn btn-primary">
                {{ __('messages.user_list') }}
            </button>
        </a>

        <a href="{{ route('users.edit', ['id' => $user->id]) }}">
            <button class="btn btn-primary">
                {{ __('messages.user_edit')}}
            </button>
        </a>
    </p>
@endsection
