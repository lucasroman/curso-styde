@extends('layout')

@section('title', 'User create - ')

@section('content')

    <h1 class="container">Create new user</h1>

    <form method="POST" action="{{ route('users.store') }}">
        {{-- CSRF (Cross-Site Request Forgery) is neccesary for security --}}
        @csrf

        <div class="form-group col-sm-6">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" id="name"
                placeholder="John Doe" value="{{ old('name') }}">

            {{-- Show error message in the field name --}}
            <br>
            @if ($errors->has('name'))
                <div class="alert alert-danger">
                    {{ $errors->first('name') }}
                </div>
            @endif
        </div>

        <div class="form-group col-sm-6">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" id="email"
                placeholder="jdoe@example.com" value="{{ old('email') }}">

            <br>
            @if ($errors->has('email'))
                <div class="alert alert-danger">
                    {{ $errors->first('email') }}
                </div>
            @endif
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
                    <option value={{ $profession->id }}
                        {{-- Keep the profession entered previously --}}
                        @if (old('profession_id') == $profession->id)
                            selected
                        @endif>
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
