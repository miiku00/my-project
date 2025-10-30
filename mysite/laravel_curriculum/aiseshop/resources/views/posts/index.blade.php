<h1>投稿一覧</h1>
@auth
    <a href="{{ route('posts.create') }}">新規投稿</a>
@endauth

@guest
    <p>投稿するにはログインしてください。</p>
@endguest

<ul>
    @foreach ($posts as $post)
        <li>
            <a href="{{ route('posts.show', $post->id) }}">
                <strong>{{ $post->title }}</strong>
            </a>
            <br>
            <p>{{ Str::limit($post->body, 20) }}</p>
        </li>
    @endforeach
</ul>
