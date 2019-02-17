@extends('layout')

@section('title', 'User edit - ')

@section('content')
    <h1 class="container">Edit user</h1>

    {{-- CHANGE STORE FOR UPDATE!!!!! this view is for edit a existing user --}}
    <form method="POST" action="{{ route('users.store') }}">
        {{-- CSRF (Cross-Site Request Forgery) is neccesary for security --}}
        @csrf

        {{-- Attributes of each field in the form --}}
        @php $fieldsAttributes = [
            ['label' => 'Name', 'type' => 'text', 'name' => 'name',
                'user' => $user],
            ['label' => 'Email', 'type' => 'email', 'name' => 'email',
                'user' => $user],
            ['label' => 'Password', 'type' => 'password',
                'name' => 'password', 'user' => $user],
            ['label' => 'Profession', 'name' => 'profession_id',
                'professions' => $professions, 'user' => $user]
            ];
        @endphp

        {{-- Loop for create each field in the form--}}
        @foreach($fieldsAttributes as $field )
            {{-- The component @field is definded in formField.blade.php
            and its alias is definded in AppServiceProvider --}}
            @field($field)
                You have not access to this component!
            @endfield
        @endforeach

        <div class="col-sm-6 text-center">
            <button dusk="user-create" type="submit" class="btn btn-primary">
                Save
            </button>
        </div>
    </form>
@endsection
