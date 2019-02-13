@extends('layout')

@section('title', 'User create - ')

@section('content')

    <h1 class="container">Create new user</h1>

    <form method="POST" action="{{ route('users.store') }}">
        {{-- CSRF (Cross-Site Request Forgery) is neccesary for security --}}
        @csrf

        {{-- Attributes of each field in the form --}}
        @php $fieldsAttributes = [[
                                 'label' => 'Name',
                                 'type' => 'text',
                                 'name' => 'name'
                                ],
                                [
                                 'label' => 'Email',
                                 'type' => 'email',
                                 'name' => 'email',
                                ],
                                [
                                'label' => 'Password',
                                'type' => 'password',
                                'name' => 'password',
                                ],
                                [
                                'label' => 'Profession',
                                'name' => 'profession_id',
                                'professions' => $professions,
                                ]
            ];
        @endphp

        {{-- Loop for create each field in the form--}}
        @foreach($fieldsAttributes as $field )
            @component('users.fieldComponent', $field)
                You have not access to this component!
            @endcomponent
        @endforeach

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
