<h1>{{ $post->title }}</h1>

<p>{{ $post->body }}</p>

<a href="{{ route('posts.index') }}">← 一覧へ戻る</a>
<a href="{{ route('posts.edit', $post->id)}}">編集する</a>
