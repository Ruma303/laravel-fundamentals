    <ol>
    @foreach($tags as $tag)
        <li>ID: {{ $tag->id }}
        | Tag name: {{ $tag->name }}</li>
    @endforeach
    </ol>
