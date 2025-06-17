<?php
#1,配列の作成
$array = [10, 20, 30];
#2,要素を追加
$array[] = 40;
#3,追加した要素にアクセス
echo $array[3] . "\n";

#4,連想配列の作成
$assocArray = [
    "name" => "taro",
    "age" => 25,
    "from" => "osaka",
];
#5,要素を追加
$assocArray["hobby"] = "shopping";
#6,追加した要素にアクセス
echo $assocArray["hobby"] . "\n";

#7,多次元配列の作成
$data = [
[
    "lang" => "PHP",
    "born" => 1995,
    "extension" => "php"
],
[
    "lang" => "Ruby",
    "born" => 1995,
    "extension" => "rb"
],
[
    "lang" => "JavaScript",
    "born" => 1995,
    "extension" => "js"
],
];

print_r($data);     #多次元配列の出力

?>
