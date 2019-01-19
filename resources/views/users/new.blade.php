@extends('layout')

@section('title', 'User create - ')

@section('content')
    <h1>Create new user</h1>

    <form method="POST" action="{{ url('user/create') }}">
        {{ csrf_field() }}

        <button type="submit">User create</button>
    </form>

    <p>
        <a href="{{ route('user.index') }}">List users</a>
    </p>
@endsection
