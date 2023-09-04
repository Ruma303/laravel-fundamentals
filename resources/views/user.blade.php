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

        @if (Session::has('exists'))
            <p class="alert alert-warning">
                {{ Session::get('exists') }}</p>
        @endif

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger">{{ $error }}</div>
            @endforeach
        @endif

        <form class="px-2" enctype="multipart/form-data" method="post" action={{ route('user.store') }}>
            @csrf
            <label for="name">Your name</label>
            <input type="text" id="name" name="name">
            <label for="file-upload">Upload a file here</label>
            <input type="file" id="file-upload" name="file">
            <button type="submit" class="btn btn-primary">Load</button>
        </form>

        {{-- % Mostrare l'immagine caricata --}}

        {{-- . Percorso errato --}}
        {{-- <img src="{{ asset('storage/app/public/uploads/pizza-small.png') }}"
            alt="pizza-small" class="mt-2 ms-1"> --}}

        {{-- * Percorso corretto --}}
        {{-- <img src="{{ asset('storage/uploads/pizza-small.png') }}"
            alt="pizza-small" class="mt-2 ms-1"> --}}


        {{-- % Iterare sulle immagini --}}
        @php
            $files = glob(public_path('storage/uploads/*'));
        @endphp

        @if (!empty($files))
            <ul class="list-unstyled d-flex gap-3">
                @foreach ($files as $file)
                    @php
                        $url = 'storage/uploads/' . basename($file);
                    @endphp
                    <li>
                        <img src="{{ asset($url) }}" class="loaded-img mt-2">
                    </li>
                @endforeach
            </ul>
        @endif

        {{-- <form method="post" action="{{ route('user.destroy'), ['user' => $user] }}" class="mt-2">
                    @csrf @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete this file</button>
                </form> --}}

    </div>

</body>

</html>
