    @extends('layouts.base')
    @section('title', 'About')

    @section('content')
        <h3>Sei in About</h3>
    @endsection

    @push('css')
        <style> body { color: blue; } </style>
    @endpush

    @php
        $shouldPush = true;
    @endphp

    @pushIf($shouldPush, 'css')
        <style>
            body {
                background-color: #cc9a62;
                color: white;
            }
        </style>
    @endpushIf




