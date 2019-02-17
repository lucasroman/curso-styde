
@extends('layout')

@section('title', "User {$user->id} - ")

@section('content')
    <h1>
        <span class="badge badge-dark">User {{ $user->id }}</span>
    </h1>

    <p>Name: <b>{{ $user->name }}</b></p>
    <p>Email: <b>{{ $user->email }}</b></p>
    <p>Profession: <b>{{ $user->profession->title }}</b></p>

    <p>
        <a href="{{ route('users.index') }}">
            <button class="btn btn-primary">List users</button>
        </a>

        <a href="{{ route('users.edit', ['id' => $user->id]) }}">
            <button class="btn btn-primary">Edit user</button>
        </a>
    </p>
@endsection
