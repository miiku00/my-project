@if(session('success'))
    <p style="color: green;">{{ session('success')}}</p>
@endif

<h1>新しい投稿</h1>

<form action="{{ route('posts.store') }}" method="POST">
    @csrf
    <label>タイトル：</label><br>
    <input type="text" name="title" value="{{ old('title', '') }}"><br><br>

    <label>本文：</label><br>
    <textarea name="body">{{ old('body', '') }}</textarea><br><br>

    <button type="submit">投稿する</button>

    @if ($errors->any())
        <ul style="color: red;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
        </ul>
     @endif   
</form>