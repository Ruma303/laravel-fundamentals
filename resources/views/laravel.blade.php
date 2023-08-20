    <!doctype html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'My Site') }}</title>
        <link rel="icon" href="{{ asset('roma.ico') }}" type="image/x-icon">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
<body>
    <header>
        <h1 id="page-title">Solo Laravel - No FE Bundler</h1>
    </header>
    <main>
        <img src="{{ asset('img/pizza-small.png') }}"
            alt="img/pizza-small.png">
    </main>
</body>
</html>
