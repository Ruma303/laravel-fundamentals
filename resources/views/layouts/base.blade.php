<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('libs.bootstrap')
    <title>@yield('title', 'Titolo di default')</title>
</head>
{{-- <title>@section('title') Titolo di default @show</title> --}}
<body>
    <header>
        {{-- @include('partials.navbar') --}}

       {{--  @includeIf('partials.navbar') --}}

        {{-- @includeWhen($items, 'partials.navbar') --}}

        {{-- @includeFirst([
            'partials._buttonGreen',
            'partials._buttonRed',
            'partials._buttonBlue',
        ]) --}}
    </header>


    <div class="container mx-0">
        <h1>Siamo in base.blade.php</h1>
        @yield('content')
    </div>



    <footer>
        @section('footer')
        <p>Footer predefinito in Base</p>
        @show
    </footer>


    <aside class="p-2">
        @section('aside')
            <h1>Aside in base.blade.php</h1>
        @show
    </aside>

    {{-- @endsection --}}



    {{--
    <form action="#" method="POST">
        @csrf
        @method('PUT')
    </form>
 --}}
</body>
</html>
