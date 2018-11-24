<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ $title }} - Styde.net</title>
    </head>
    <body>
        <h1>User {{ $id }}</h1>

        <p>User's details: {{ $id }}</p>

    </body>
</html>
