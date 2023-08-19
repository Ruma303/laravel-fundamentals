{{-- <?php echo '<h1>Ciao da app.blade.php</h1>'; ?> --}}


{{-- % Mustache Syntax --}}

{{-- $ Interpolazione di variabili PHP --}}
{{-- * Blade --}}
{{-- <p>Mi chiamo {{ $name }} e ho {{ $age }} anni.</p> --}}
{{-- . PHP --}}
{{-- <?= '<p>Mi chiamo ' . $name . ' e ho ' . $age . ' anni.</p><br>' ?>
<p>Mi chiamo <?= $name ?> e ho <?= $age ?> anni.</p>
<p>Mi chiamo <?php echo $name; ?> e ho <?php echo $age; ?> anni.</p> --}}


{{-- $ Commenti --}}
{{-- Commenti
multi
linea  --}}


{{-- $ Esecuzione Codice PHP --}}
{{-- <p> {{ 2 * 2 === 4 ? 'Ciao' : 'Arrivederci' }} </p>
<p> {{ date('Y') }} </p> --}}


{{-- $ Utilizzo di funzioni helper di Laravel --}}
{{-- <a href={{ route('hello') }}>Vai alla pagina Hello World</a> --}}


{{-- $ Escape codice JavaScript --}}

{{-- {{ $script }}
<?php echo htmlentities($script); ?> --}}

{{-- ! Codice JavaScript Eseguito --}}
{{-- {!! $script !!} --}}
{{-- <?= $script ?> --}}


{{-- $ Ignorare l'interpolazione --}}
{{-- @{{ $name }} --}}

{{-- $ Creare Variabili --}}
{{-- {{ $x = 5 }} {{ $x }} --}}






{{-- % Direttive Blade --}}

{{-- $ @php --}}

{{-- @php
    $x = 5;
    $y = 2;
    echo "\$x: $x <br>\$y: $y";
@endphp --}}
{{-- {{ $x, $y }}; --}}


{{-- $ @dump, @dd --}}
{{-- @dump($items)
<p>Codice dopo eseguito.</p>

@dd($items)
<p>Codice dopo non eseguito.</p> --}}


{{-- $ @if, @elseif, @else  --}}
{{-- @if ($age >= 18)
    <p>Sono maggiorenne</p>
@elseif ($name === "Matteo")
    <p>Ciao Matteo</p>
@else
    <p>Sono minorenne</p>
@endif --}}



{{-- $ @switch, @case, @break, @default --}}
{{-- @switch($age)
    @case($age >= 18)
        <p>Sono maggiorenne</p>
        @break
    @case($age < 18)
        <p>Sono minorenne</p>
        @break
    @default
        <p>Errore</p>
@endswitch --}}



{{-- $ @unless --}}

{{-- @if ($age >= 18)
    <p>Sei maggiorenne</p>
@endif

@unless ($age >= 18)
    <p>Sei minorenne</p>
@endunless --}}


{{-- $ @for --}}

{{-- @for ($i = 1; $i < 10; $i++)
    @continue($i === 3)
    <p>Iterazione {{ $i }}</p>
    @break($i === 5)
@endfor --}}


{{-- $ @while --}}
{{-- @php $i = 0; @endphp
@while ($i < count($items))
    <p>{{ $items[$i] }}</p>
    @php $i++; @endphp
@endwhile --}}



{{-- $ @foreach --}}
{{-- <ul>
    @foreach ($items as $item)
    <li>Articolo: {{ $item }}</li>
    @endforeach
</ul> --}}


{{-- $ loop --}}
{{-- <ul>
        @foreach ($items as $item)
        <li>Indice: {{ $loop->index }}</li>
        <li>Iterazione numero: {{ $loop->iteration }}</li>
        <li>Iterazioni rimanenti: {{ $loop->remaining }}</li>
        <li>Num totale: {{ $loop->count }}</li>
        <li>Prima iterazione: {{ $loop->first }}</li>
        <li>Ultima iterazione: {{ $loop->last }}</li>
        <li>Iterazione Pari: {{ $loop->even }}</li>
        <li>Iterazione Dispari: {{ $loop->odd }}</li>
            @foreach ($items as $item)
            <li>Ti trovi nel ciclo interno: {{ $loop->depth }}</li>
            @endforeach
            <li>Ti trovi nel ciclo esterno: {{ $loop->parent }}</li>
        @endforeach
    </ul> --}}


{{-- $ @each --}}
{{-- @each('each', $items, 'item', 'empty') --}}


{{-- $ @forelese, @empty --}}
{{-- @forelse($items as $item)
    <li>Articolo {{ $loop->iteration }}: {{ $item }}</li>
@empty
    <strong>Non sono presenti articoli</strong>
@endforelse --}}





{{-- % Ereditarietà --}}

{{-- $ @extends --}}

{{-- @extends('layouts.base') --}}

{{-- $ @section --}}
{{-- @section('content')
    <h3>Siamo in app.blade.php</h3>
@endsection
 --}}
{{-- @section('title', 'Blade Tutorial') --}}

{{-- @section('bootstrap')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous" defer>
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous" defer>
    </script>
@endsection
 --}}

{{-- $ @show Footer --}}

{{-- @section('footer')
    <p>Footer personalizzato</p>
@endsection --}}


{{-- $ @parent --}}

{{-- @section('aside')
    <p>Contenuto in app.blade.php</p>
    @parent
@endsection --}}



{{-- $ @stop --}}

{{-- @section('aside')
    <p>Sezione estesa in app.blade.php</p>
    @parent
    <p>Contenuto appeso alla sezione estesa</p>
    @stop
    <p>Testo escluso</p> --}}
