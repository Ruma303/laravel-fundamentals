<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'My Site') }}</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <header>
        <h1 class="text-center mt-3">
            <a href={{ route('users.index') }}
            class="text-decoration-none">Laravel CRUD</a>
        </h1>
    </header>
    <main class="container d-flex flex-column">
        @yield('content')
    </main>
</body>
</html>
