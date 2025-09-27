<?php
#Lesson12-2

$dsn = 'mysql:dbname=sample;host=db';
$user = 'phper';
$password = 'root';

try {
    
    $dbh = new PDO($dsn, $user, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    

    $sql = 'SELECT * FROM users LIMIT 20';  #20人のユーザー
    $stmt = $dbh->query($sql);
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
 #2,idを全件表示
    foreach($results as $row) {
        echo $row['id'] . "\n";
    }
    
 #3,id7,12,17のuser_idだけ表示
    $sql3 = 'SELECT users_id FROM users WHERE id IN (7, 12, 17)';
    $stmt3 = $dbh->query($sql3);
    $results3 = $stmt3->fetchAll(PDO::FETCH_ASSOC);

        foreach ($results3 as $row) {
            echo $row['users_id'] . "\n";
        }

    
    
#Lesson12-3
 #sample.json 読み込み
    $json = file_get_contents('sample.json');
    $data = json_decode($json, true);
   
 #都道府県データ登録
        foreach ($data as $info) {
            foreach ($info as $prefID => $pref) {
                
               $stmtPref = $dbh->prepare("INSERT INTO prefecture (prefecture_id, name) VALUES (:id, :name)");
                $stmtPref->execute([
                               ':id' => $pref['id'],
                               ':name' => $pref['name']
                               ]);
            
 #市区町村データ登録
            foreach ($pref['city'] as $city) {
                if (!empty($city['deleted'])) {
                    continue;           #deletedは飛ばす
                }
                
                $stmtCity = $dbh->prepare("INSERT INTO city (name, citycode) VALUES (:city_city, :city_citycode)");
                $stmtCity->execute([
                                   ':city_city' => $city['city'],
                                   ':city_citycode' => $city['citycode']
                                   ]);
            }
            }
        }
 
 #cityに都道府県idを追加
    foreach ($data as $info) {
        foreach ($info as $prefID => $pref) {
            foreach ($pref['city'] as $city) {
                $stmtUpdate = $dbh->prepare("
                    UPDATE city
                    SET prefecture_id = :prefecture_id
                    WHERE citycode = :citycode
                ");
                $stmtUpdate->execute([
                    ':prefecture_id' => $pref['id'],
                    ':citycode' => $city['citycode']
                ]);
            }
        }
    }

    
 #県ごとの市区町村の数を表示
    $stmtCount = $dbh->query("
        SELECT p.name AS prefecture_name, COUNT(c.citycode) AS city_count
        FROM prefecture p
        LEFT JOIN city c ON p.prefecture_id = c.prefecture_id
        GROUP BY p.prefecture_id
    ");
    /*  COUNT 市区町村の数をカウント
        JOIN 結合先のテーブル指定
        ON prefectureテーブルとcityテーブルのprefecture_idで結合
        LEFT JOIN 市区町村のない都道府県も全て表示
        GROUP BY 都道府県ごとに集計する */
    
    while ($row = $stmtCount->fetch(PDO::FETCH_ASSOC)) {
        echo "{$row['prefecture_name']}:{$row['city_count']}\n";
    }
} catch (PDOException $e) {
    print('Error:' . $e->getMessage());
    die();
             
}
     
?>
