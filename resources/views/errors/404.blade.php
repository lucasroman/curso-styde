@extends('layout')

@section('title', "Page not found - ")

@section('content')
    <h1>Page not found</h1>

    <a href="{{ route('user.index') }}">Back to user list</a>
@endsection
