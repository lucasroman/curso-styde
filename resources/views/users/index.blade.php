@extends('layout')

@section('title', 'User list - ')

@section('content')
    <h1>{{ $title }}</h1>

    <ul>
        @forelse ($users as $user)
            <li>
                <a href="{{ route('users.show', ['id' => $user->id]) }}">
                    <b>{{ $user->name }}</b>
                </a>
                {{ $user->email }}
                <a href="{{ route('users.edit', ['id' => $user->id]) }}">
                    <b>Edit</b>
                </a>
            </li>
        @empty
            <p>There are not users.</p>
        @endforelse
    </ul>

    {{ $users->links() }} {{-- Pagination buttons --}}
@endsection
