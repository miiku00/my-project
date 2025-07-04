<?php
#1,idと各都道府県名（short）を表⽰
$file = file_get_contents('sample.json');   #JSONファイル読み込み

$data = json_decode($file, true);   #連想配列に変換

foreach ($data as $info) {  #都道府県ごとに取り出す
   foreach ($info as $num => $pref) {   #都道府県コードと情報を取り出す
       
    echo "id:" . $pref['id'] . "は" . $pref['short'] . "\n";
   }
}


#2,配列に値をセットして表⽰
$file = file_get_contents('sample.json');
$data = json_decode($file, true);

foreach ($data as $info) {
    foreach ($info as $pref) {
        foreach ($pref['city'] as $city) {  #市区町村を取り出す
            
            $cities[] = [$pref['name'] => $city['city']];   #配列の作成
        }
    }
}

var_dump($cities);

?>
