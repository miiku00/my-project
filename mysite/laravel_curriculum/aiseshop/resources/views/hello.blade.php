<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Helloページ</title>
    </head>
    <body>
        <h1>Hello Laravel!</h1>
        <p>これはLaravelで作成した初めてのページです。</p>
        <a href="{{ route('text_page') }}">別ページへ</a>
    </body>
</html>