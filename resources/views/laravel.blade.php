<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'My Site') }}</title>
</head>
<body>
    <div id="container py-2">
        <h1 class="text-center mt-3">Laravel</h1>
    </div>
</body>
</html>

{{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}
