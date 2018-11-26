
@extends('layout')

@section('title', "User {$id} - ")

@section('content')
    <h1>User {{ $id }}</h1>

    <p>User's details: {{ $id }}</p>
@endsection
