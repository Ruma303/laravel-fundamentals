<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Titolo di default')</title>
    @yield('bootstrap')
    {{-- <title>@section('title') Titolo di default @show</title> --}}
</head>
<body>

    <header>
        @section('header')
            {{-- <h1>Titolo Header base.blade.php</h1> --}}
        @show
        {{-- @include('components.navbar') --}}
        {{-- @includeIf('components.navbar') --}}
        {{-- @includeWhen(3 === 3, 'components.navbar') --}}
        {{-- @includeFirst(['partials._buttonGreen' ,'partials._buttonRed', 'partials._buttonBlue']) --}}
    </header>


{{--
    <div class="container mx-0">
        <h1>Sono in base.blade.php</h1>
        @yield('content')
    </div>

 --}}

    {{-- <footer>
        @section('footer')
        <p>Footer</p>
        @show
    </footer> --}}
    {{-- @endsection --}}



    {{--
    <form action="#" method="POST">
        @csrf
        @method('PUT')
    </form>
 --}}
</body>
</html>
