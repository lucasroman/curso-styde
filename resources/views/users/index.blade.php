@extends('layout')

@section('title', 'User list - ')

@section('content')
    <h1>{{ __('messages.living') }}</h1>

    @if ($users->isNotEmpty())
        <table class="table">
          <thead class="thead-dark">
            <tr>
              <th scope="col">id</th>
              <th scope="col">{{ __('messages.name') }}</th>
              <th scope="col">{{ __('messages.email') }}</th>
              <th scope="col">{{ __('messages.actions') }}</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($users as $user)
                  <tr>
                      <th scope="row">{{ $user->id }}</th>

                      <td>
                          <a href="{{ route('users.show', $user) }}">
                              <b>{{ $user->name }}</b>
                          </a>
                      </td>

                      <td>
                          {{ $user->email }}
                      </td>

                      <td>
                          <form action="{{ route('users.destroy', $user) }}"
                              method="POST">
                              @csrf
                              @method('DELETE')
                              <a href="{{ route('users.show', $user) }}"
                                <span class="oi oi-eye btn btn-link"></span>
                              </a>
                              <a href="{{ route('users.edit', $user) }}"
                                <span class="oi oi-pencil btn btn-link"></span>
                              </a>
                              <button type="submit" class="btn btn-link">
                                  <span class="oi oi-trash"></span>
                              </button>
                          </form>
                      </td>
                  </tr>
              @endforeach
          </tbody>
        </table>
    @else
        <p>There are not users.</p>
    @endif

    {{ $users->links() }} {{-- Pagination buttons --}}
@endsection
