<?php
#1,モーダルを出現させる
    #ターミナルで php -S localhost:8000
    #ブラウザでhttp://localhost:8000/xss_test.php
    #フォームに入力、送信 <script>alert('Hello')</script>

#2,エスケープ処理
    #エスケープ処理関数 htmlspecialchars
if ($_GET && $_GET['script']) {
    echo htmlspecialchars($_GET['script'], ENT_QUOTES, 'UTF-8');
}
?>

<form>
    <input type="text" name="script">
    <input type="submit" value="送信">
</form>
