    <h3>Post Title: <em>{{ $post->title }}</em></h3>
    <p>Post # {{ $post->id }}</p>
    <p>Tags</p>
    <ul>
        @foreach($post->tags as $tag)
            <li>ID: {{ $tag->id }}. Tag name: {{ $tag->name }}</li>
        @endforeach
    </ul>
    <p>Quote</p>
    <blockquote>
        <em>{{ $post->body }}</em>
    </blockquote>


