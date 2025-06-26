<?php
#1,名前、年齢、出身地 を出力
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
 #POSTされた時のみ処理を行う
    
$name = $_POST['name'];
$age  = $_POST['age'];
$from = $_POST['from'];

echo $name . "<br>";
echo $age . "<br>";
echo $from . "<br>";


#2,成人か未成年か
if ($age >= 20) {
    echo "成人です<br>";
} else {
    echo "未成年です<br>";
    }


#3,東京かどうか
if ($from === "東京") {   #比較 ===
    echo "東京は日本の首都です<br>";
} else {
    echo $from . "は日本の首都ではありません<br>";
    }
    
}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>GET, POSTメソッド</title>
</head>
<body>
    <h1>フォーム</h1>
    <form action="index.php" method="post">
        <label>名前</label>
        <input type="text" name="name">

        <label>年齢</label>
        <input type="number" name="age">

        <label>出身地</label>
        <input type="text" name="from">

        <input type="submit" value="送信">
    </form>
</body>
</html>
