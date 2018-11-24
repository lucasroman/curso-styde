<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ $title }} - Styde.net</title>
    </head>
    <body>
        <h1>{{ $title }}</h1>

        <ul>
            @forelse ($users as $user)
                <li>{{ $user }}</li>
            @empty
                <p>There are not users.</p>
            @endforelse
        </ul>
    </body>
</html>
