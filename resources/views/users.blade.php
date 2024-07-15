    @extends('layouts.base')
    {{-- @section('title', 'User: ' . $name) --}}
    @section('title', "User: $name")

    @section('content')
        <h3>Benvenuto, {{ $name }}</h3>
    @endsection


    