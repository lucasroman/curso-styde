@extends('layout')

@section('title', 'User create - ')

@section('content')
    <h1>Create new user</h1>

    <form method="POST" action="{{ route('users.store') }}">
        {{-- CSRF (Cross-Site Request Forgery) is neccesary for security --}}
        @csrf

        <label for="name">Name: </label>
        <input type="text" name="name" id="name" placeholder="John Doe"><br>

        <label for="email">Email: </label>
        <input type="email" name="email" id="email"
            placeholder="jdoe@example.com"><br>

        <label for="password">Password: </label>
        <input type="password" name="password" id="password"
            placeholder="my pass"><br>

        <label for="profession_id">Profession: </label>
        <select name="profession_id">
            @foreach($professions as $profession)
                <option value={{ $profession->id }}>
                    {{ $profession->title }}
                </option>
            @endforeach
        </select><br>

        <button dusk="user-create" type="submit">User create</button>
    </form>

    <p>
        <a href="{{ route('users.index') }}">List users</a>
    </p>
@endsection
