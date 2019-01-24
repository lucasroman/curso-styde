@extends('layout')

@section('title', 'User create - ')

@section('content')
    <h1>Create new user</h1>

    <form method="POST" action="{{ route('users.store') }}">
        {{ csrf_field() }}

        <button dusk="user-create" type="submit">User create</button>
    </form>

    <p>
        <a href="{{ route('users.index') }}">List users</a>
    </p>
@endsection
