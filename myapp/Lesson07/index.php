<?php
#1,九九の表示
for ($i = 1; $i <= 9; $i++) {
    for ($j = 1; $j <= 9; $j++) {       #for文をネスト
        echo "$i * $j = " . ($i * $j) . "\n";
    }
}

#2,名前、年齢、出身地を表⽰
#配列
$emp = ['中田' => ['age' => '23','pref' => '東京'],
        '山本' => ['age' => '19','pref' => '京都'],
        '佐藤' => ['age' => '30','pref' => '大阪'],
        '小林' => ['age' => '22','pref' => '福岡']
        ];

foreach ($emp as $name => $info) {      #キー(名前)を$name、値(年齢、出身地)を$infoに入れる
    echo "name:{$name}\n";
    echo "age:{$info['age']}\n";
    echo "pref:{$info['pref']}\n";
    echo "\n";
}

#応用1
$number = [];   #空の配列
for ($i = 1; $i <= 40; $i++) {
    #3で割ってあまりが0または、3が付く数字
    if ($i % 3 == 0 || preg_match('/3/',$i))    #参考：https://techplay.jp/column/531
    $number[] = $i;     #配列に格納
}
 #foreach文で数字のみ取り出す
foreach ($number as $number3) {
    echo "$number3 ";
}
echo "\n";

#応用2
$emp = ['中田' => ['age' => '23','pref' => '東京'],
        '山本' => ['age' => '19','pref' => '京都'],
        '佐藤' => ['age' => '30','pref' => '大阪'],
        '小林' => ['age' => '22','pref' => '福岡']
        ];
#foreachで取り出す
foreach ($emp as $name => $info) {      #配列 as キー => 値
        $name_age[] = ['name' => $name, 'age' => $info['age']];     //[配列] [name = '名前', 'age' = '年齢']
    }
#配列を出力
print_r($name_age);

?>
