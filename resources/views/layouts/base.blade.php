<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous" defer>
</script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous" defer>
</script>
    @yield('bootstrap')
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
