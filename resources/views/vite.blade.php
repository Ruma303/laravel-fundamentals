<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('roma.ico') }}" type="image/x-icon">
    <title>Laravel + Vite</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <header>
        <h1 id="page-title">Laravel + Vite.js Bundler</h1>
    </header>
    <main>
        <img alt="img/pizza-small.png">
    </main>
</body>
</html>
