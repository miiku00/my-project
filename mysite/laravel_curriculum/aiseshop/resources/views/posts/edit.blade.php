<h1>投稿を編集</h1>

<form action="{{ route('posts.update', $post->id) }}" method="POST">
    @csrf
    @method('PUT')
    
    <label>タイトル：</label><br>
    <input type="text" name="title" value="{{ old('title', $post->title) }}"><br><br>

    <label>本文：</label><br>
    <textarea name="body">{{ old('body', $post->body) }}</textarea><br><br>

    <button type="submit">更新する</button>
</form>

<a href="{{ route('posts.show', $post->id) }}">← 詳細に戻る</a>
