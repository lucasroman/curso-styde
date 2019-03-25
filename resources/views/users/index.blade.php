@extends('layout')

@section('title', 'User list - ')

@section('content')
    <h1>{{ __('messages.living') }}</h1>
    <ul>
        @forelse ($users as $user)
            <li>
                <a href="{{ route('users.show', $user) }}">
                    <b>{{ $user->name }}</b>
                </a>

                {{ $user->email }}

                <a href="{{ route('users.edit', $user) }}">
                    <b>{{ __('messages.user_edit') }}</b>
                </a>

                <form action="{{ route('users.destroy', $user) }}"
                    method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">
                        <b>Delete</b>
                    </button>
                </form>
            </li>
        @empty
            <p>There are not users.</p>
        @endforelse
    </ul>

    {{ $users->links() }} {{-- Pagination buttons --}}
@endsection
