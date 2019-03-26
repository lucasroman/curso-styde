@extends('layout')

@section('title', 'User create - ')

@section('content')
    <div class="card">
        <h4 class="card-header">{{ __('messages.user_new') }}</h4>
        <div class="card-body">
            <form method="POST" action="{{ route('users.store') }}">
                {{-- CSRF (Cross-Site Request Forgery) is neccesary for
                     security --}}
                @csrf

                {{-- Attributes of each field in the form --}}
                @php $fieldsAttributes = [
                    ['label' => __('messages.name'), 'type' => 'text',
                        'name' => 'name', 'user' => $user],
                    ['label' => __('messages.email'), 'type' => 'email',
                        'name' => 'email', 'user' => $user],
                    ['label' => __('messages.password'), 'type' => 'password',
                        'name' => 'password', 'user' => $user],
                    ['label' => __('messages.profession'),
                        'name' => 'profession_id',
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

                <div class="text-center">
                    <button dusk="user-create" type="submit"
                        class="btn btn-primary">
                        {{ (__('messages.save'))}}
                    </button>
                </div>
            </form>

            <div class="text-center">
                <a class="btn btn-link" href="{{ route('users.index') }}">
                    {{ __('messages.user_list')}}
                </a>
            </div>
        </div>
@endsection
