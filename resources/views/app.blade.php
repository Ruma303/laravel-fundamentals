    {{-- <?php echo '<h1>Ciao da app.blade.php</h1>'; ?> --}}


    {{-- % Mustache Syntax --}}

    {{-- , Interpolazione di variabili PHP --}}
    {{-- * Blade --}}
    {{-- <p>Mi chiamo {{ $name }} e ho {{ $age }} anni.</p> --}}
    {{-- . PHP --}}
    {{-- <?= '<p>Mi chiamo ' . $name . ' e ho ' . $age . ' anni.</p><br>' ?>
    <p>Mi chiamo <?= $name ?> e ho <?= $age ?> anni.</p>
    <p>Mi chiamo <?php echo $name; ?> e ho <?php echo $age; ?> anni.</p> --}}


    {{-- , Escape codice JavaScript --}}
    {{-- {{ $script }} --}}
    {{-- <?php echo htmlentities($script); ?> --}}

    {{-- ! Codice JavaScript Eseguito --}}
    {{-- {!! $script !!} --}}
    {{-- <?= $script ?> --}}

    {{-- <p>{{ strip_tags($script) }}</p> --}}


    {{-- , Commenti --}}
    {{--
        Commenti
        multi
        linea
    --}}


    {{-- , Esecuzione Codice PHP --}}
    {{-- <p> {{ 2 * 2 === 4 ? 'Ciao' : 'Arrivederci' }} </p>
    <p> {{ date('Y') }} </p> --}}


    {{-- , Utilizzo di funzioni helper di Laravel --}}
    {{-- <a href={{ route('hello') }}>Vai alla pagina Hello World</a> --}}


    {{-- , Ignorare l'interpolazione --}}
    {{-- @{{ $name }} : {{ $name }} --}}

    {{-- , Creare Variabili --}}
    {{-- {{ $x = 5 }} {{ $x }} --}}




    {{-- % Direttive Blade --}}

    {{-- , Ignorare le direttive Blade con @ --}}
    {{-- @@if() --}}



    {{-- , @php --}}
    {{-- @php
        $x = 5;
        $y = 2;
        echo "\$x: $x <br>\$y: $y";
    @endphp --}}
    {{-- {{ $x, $y }}; --}}


    {{-- , @once --}}

    {{-- @once
        <script src="https://example.com/script.js"></script>
    @endonce --}}


    {{-- , @dump, @dd --}}
    {{-- @dump($items)
    <p>Codice dopo eseguito.</p>

    @dd($items)
    <p>Codice dopo non eseguito.</p> --}}



    {{-- , @if, @elseif, @else --}}
    {{-- @if ($age >= 18)
        <p>Sono maggiorenne</p>
    @elseif ($name === "Matteo")
        <p>Ciao Matteo</p>
    @else
        <p>Sono minorenne</p>
    @endif --}}



    {{-- , @switch, @case, @break, @default --}}
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



    {{-- , @unless --}}
    {{-- @if ($age >= 18)
        <p>Sei maggiorenne</p>
    @endif --}}

    {{-- @unless ($age <= 18)
        <p>Sei minorenne</p>
    @endunless --}}


    {{-- , @for --}}
    {{-- @for ($i = 1; $i < 10; $i++)
        @continue($i === 3)
        <p>Iterazione {{ $i }}</p>
        @break($i === 5)
    @endfor --}}


    {{-- , @while --}}
    {{-- @php $i = 0; @endphp
    @while ($i < count($items))
        <p>{{ $items[$i] }}</p>
        @php $i++; @endphp
    @endwhile
    --}}


    {{-- , @foreach --}}
    {{-- <ul>
        @foreach ($items as $item)
        <li>Articolo: {{ $item }}</li>
        @endforeach
    </ul> --}}


    {{-- , loop --}}
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



    {{-- , @forelese, @empty --}}
    {{-- @forelse($items as $item)
        <li>Articolo {{ $loop->iteration }}: {{ $item }}</li>
    @empty
        <strong>Non sono presenti articoli</strong>
    @endforelse --}}



    {{-- , @isset, @empty --}}
    {{-- @isset($name)
        <p>La variabile $name è definita</p>
    @endisset --}}

    {{-- @empty(!$items)
        @foreach ($items as $item)
            <p>{{ $item }}</p>
        @endforeach
    @endempty --}}


    {{-- , @production, @env() --}}

    {{-- @env(['production', 'local'])
        <h2>Homepage</h2>
    @endenv

    @env('local')
        <p>Sei in locale</p>
    @endenv

    @env('testing')
        <p>Sei in testing</p>
    @endenv

    @production
        <p>Sei in produzione</p>
    @endproduction --}}


    {{-- , @class, @style --}}
    {{-- @php
        $isActive = false;
        $hasError = true;
    @endphp

    <div @class([
        'container',
        'bg-primary' => $isActive,
        'text-white'
    ])>
        <p @style([
            'background-color: red' => $hasError,
            'color: white' => $isActive ?? 'color: black',
            'padding: 10px',
            'font-weight: bold' => $name === 'Matteo' ?? 'font-weight: normal',
        ])>{{ $name }}</p>
    </div> --}}


    {{-- , @checked(), @selected(), @disabled(), @readonly(), @required() --}}
    {{-- <label>Ci sono le scarpe nell'array $items?</label>
    <input type="radio" @checked(in_array("Scarpe", $items))>

    @php
        $selected = '2';
    @endphp

    <select>
        <option value="1" @selected($selected)>Uno</option>
        <option value="2" @selected($selected)>Due</option>
        <option value="3" @selected($selected)>Tre</option>
    </select>

    @php
        $disabled = '2';
    @endphp

    <select>
        <option value="1" @disabled($disabled)>Uno</option>
        <option value="2" @disabled($disabled)>Due</option>
        <option value="3" @disabled($disabled)>Tre</option>
    </select>

    <input type="text" @readonly($name === 'Matteo')>

    <input type="text" @required($age === 28)> --}}





    {{-- % Ereditarietà --}}


    {{-- , @extends --}}

    @extends('layouts.base')


    {{-- , @each --}}
    {{-- @each('each', $items, 'item', 'empty') --}}


    {{-- , @section --}}
    {{-- @section('title', 'Blade Tutorial') --}}

    {{-- @section('content')
        <h3>Siamo in app.blade.php</h3>
    @endsection
    --}}
    

    {{-- , @show Footer --}}

    {{-- @section('footer')
        <p>Footer personalizzato</p>
    @endsection --}}


    {{-- , @parent --}}

    {{-- @section('aside')
        <p>Contenuto in app.blade.php</p>
        @parent
    @endsection --}}



    {{-- , @stop --}}

    {{-- @section('aside')
        <p>Sezione estesa in app.blade.php</p>
        @parent
        <p>Contenuto appeso alla sezione estesa</p>
        @stop
        <p>Testo escluso</p> --}}
