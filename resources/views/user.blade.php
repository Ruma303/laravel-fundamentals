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
        <h1 class="text-center mt-3">Database + File Storage</h1>

        @if (session('success'))
            <p class="alert alert-success">
                {{ session('success') }}</p>
        @endif

        @if (session('deleted'))
            <p class="alert alert-warning">
                {{ session('deleted') }}</p>
        @endif

        @if($errors->any())
            @foreach($errors->all() as $error)
            <div class="alert alert-danger">{{ $error }}</div>
            @endforeach
        @endif

        <form class="px-2" enctype="multipart/form-data"
            method="post" action={{ route('user.store') }}> @csrf
            <label for="name">Your name</label>
            <input type="text" id="name" name="name">
            <br>
            <label for="file-upload">Upload a file here</label>
            <input type="file" id="file-upload" name="file">
            <button type="submit" class="btn btn-primary">Load</button>
        </form>

        <img src="{{ asset('storage/images/pizza-small.png') }}" alt="pizza-small" class="loaded-img mt-2">

        {{-- @php
        $filePath = 'images/pizza-small.png';
        @endphp
        @if (Storage::disk('public')->exists($filePath))
            <form method="post" action="{{ route('delete') }}" class="mt-2">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete this file</button>
            </form>
        @endif --}}
    </div>
</body>

</html>
