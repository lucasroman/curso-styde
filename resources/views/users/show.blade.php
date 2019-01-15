
@extends('layout')

@section('title', "User {$user->id} - ")

@section('content')
    <h1>User id: {{ $user->id }}</h1>

    <p>Name: <b>{{ $user->name }}</b></p>
    <p>Email: <b>{{ $user->email }}</b></p>
    <p>Profession: <b>{{ $user->profession->title }}</b></p>

    <p>
        <a href="{{ route('user.index') }}">List users</a>
    </p>
@endsection
