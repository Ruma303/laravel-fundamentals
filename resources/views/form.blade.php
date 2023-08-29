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
    <div class="container mx-auto p-2 d-flex flex-column">
        <h1 class="text-center mt-3">File Storage</h1>

        @if (session('success'))
            <p class="alert alert-success">
                {{ session('success') }}</p>
        @endif

        <form class="px-2" enctype="multipart/form-data" method="post" action={{ route('upload') }}> @csrf
            <label for="file-upload">Upload File</label>
            <input type="file" id="file-upload" name="file-name">
            <button type="submit" class="btn btn-primary">Load</button>
        </form>

        <img src="{{ asset('storage/images/pizza-small.png') }}" alt="pizza-small" class="loaded-img">
    </div>
</body>

</html>
