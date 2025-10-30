<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>フォームの練習</title>
    </head>
    <body>
        <h1>お名前を入力してください</h1>

        <form action="{{ route('form.submit') }}" method="POST">
            @csrf
            <input type="text" name="name" placeholder="例：田中太郎">
            <button type="submit">送信</button>
        </form>
    </body>
</html>