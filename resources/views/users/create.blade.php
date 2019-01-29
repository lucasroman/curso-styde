@extends('layout')

@section('title', 'User create - ')

@section('content')

    <div class="col-sm-6">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul style="list-style-type:none;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>

    <h1 class="container">Create new user</h1>

    <form method="POST" action="{{ route('users.store') }}">
        {{-- CSRF (Cross-Site Request Forgery) is neccesary for security --}}
        @csrf

        <div class="form-group col-sm-6">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" id="name"
                placeholder="John Doe">
        </div>

        <div class="form-group col-sm-6">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" id="email"
                placeholder="jdoe@example.com">
        </div>

        <div class="form-group col-sm-6">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password"
                id="password" placeholder="my pass">
        </div>

        <div class="form-group col-sm-6">
            <label for="profession_id">Profession</label>
            <select name="profession_id" class="form-control"
                id="profession_id">
                @foreach($professions as $profession)
                    <option value={{ $profession->id }}>
                        {{ $profession->title }}
                    </option>
                @endforeach
            </select><br>
        </div>

        <div class="col-sm-6 text-center">
            <button dusk="user-create" type="submit" class="btn btn-primary">
                Save
            </button>
        </div>
    </form>

    <br>
    <div class="col-sm-6 text-center">
        <a class="btn btn-link" href="{{ route('users.index') }}">
            Back to list users
        </a>
    </div>

@endsection
