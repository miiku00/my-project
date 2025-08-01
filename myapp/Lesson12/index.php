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
    
} catch (PDOException $e) {
    print('Error:' . $e->getMessage());
    die();
             
}
     
?>
