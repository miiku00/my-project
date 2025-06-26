<?php
#数値を３つ引数として渡したら、その数値の平均値を返す関数
 #引数が３つでない場合はエラーメッセージを返す
 #引数が数値でない場合もエラーメッセージを返す
function average(...$nums) {   #可変長引数...
    foreach ($nums as $num) {   #繰り返し処理で引数それぞれを調べる
        if (!is_numeric($num)) {    #数値以外がある場合
            return "エラー：引数は数値である必要があります \n";
        }
    }
    if (count($nums) !== 3) {   #引数を数えて３つ以外
        return "エラー：引数は３つ必要です \n";
    }
    return array_sum($nums) / 3 . "\n";    #引数の合計値 array_sum
    }

#関数の呼び出し
 echo average(1,2);         #出力結果→ エラー：引数は３つ必要です
 echo average(1,'a',2,3);   #出力結果→ エラー：引数は数値である必要があります
 echo average(1,2,3);       #出力結果→ 2


#1,１つの配列にする。
$colors1 = ['BLUE', 'RED', 'GREEN'];
$colors2 = ['yellow', 'magenta', 'cyan'];
 #複数の配列をマージする array_merge
$colors3 = array_merge($colors1, $colors2);

print_r($colors3);


#2,小文字に揃える
 #配列のすべての要素に処理を行う array_map
 #文字列内のすべての文字を小文字に変換 strtolower
$colors1_lower = array_map("strtolower", $colors1);
$colors2_lower = array_map("strtolower", $colors2);

$colors3 = array_merge($colors1_lower, $colors2_lower);

print_r($colors3);


#3,配列の最後に'black'を追加
$colors3[] = 'black';
print_r($colors3);


#4,要素'green'が存在するかを判定
 #配列に値があるかチェックする in_array
if (in_array('green', $colors3)) {
    echo "あり \n";   #存在したら「あり」
} else {
    echo "なし \n";   #存在しなければ「なし」
}

?>
