
@extends('layout')

@section('title', "User {$user->id} - ")

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>
                {{ __('messages.user') }} {{ $user->id }}
            </h4>
        </div>
        <div class="card-body">
            <p>{{ __('messages.name') }}: <b>{{ $user->name }}</b></p>
            <p>{{ __('messages.email') }}: <b>{{ $user->email }}</b></p>
            <p>{{ __('messages.profession') }}: <b>{{ $user->profession->title }}</b></p>

            <p>
                <a href="{{ route('users.index') }}">
                    <button class="btn btn-primary">
                        {{ __('messages.user_list') }}
                    </button>
                </a>

                <a href="{{ route('users.edit', $user) }}">
                    <button class="btn btn-primary">
                        {{ __('messages.user_edit')}}
                    </button>
                </a>
            </p>
        </div>
    </div>
@endsection
