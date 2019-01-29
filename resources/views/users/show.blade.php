
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
        <a href="{{ route('users.index') }}">List users</a>
    </p>
@endsection
