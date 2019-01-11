@extends('layout')

@section('title', 'User list - ')

@section('content')
    <h1>{{ $title }}</h1>

    <ul>
        @forelse ($users as $user)
            <li><b>{{ $user->name }}</b>, {{ $user->email}}</li>
        @empty
            <p>There are not users.</p>
        @endforelse
    </ul>
@endsection

@section('sidebar')
     @parent {{-- Original content of this section --}}

    <h2>Custom sidebar</h2> {{-- Custom content of this section --}}
@endsection
