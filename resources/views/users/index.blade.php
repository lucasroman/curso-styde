@extends('layout')

@section('title', 'User list - ')

@section('content')
    <h1>{{ $title }}</h1>

    <ul>
        @forelse ($users as $user)
            <li>
                <a href="{{ route('user.show', ['id' => $user->id]) }}">
                    <b>{{ $user->name }}</b>
                </a>
                {{ $user->email }}
            </li>
        @empty
            <p>There are not users.</p>
        @endforelse
    </ul>

    {{ $users->links() }} {{-- Pagination buttons --}}
@endsection

@section('sidebar')
     @parent {{-- Original content of this section --}}

    <h2>Custom sidebar</h2> {{-- Custom content of this section --}}
@endsection
