<?php
    // データベースに接続する
    $dsn = 'mysql:host=mysql1.php.xdomain.ne.jp;dbname=orijinaru_db1;charset=utf8';
    $user = 'orijinaru_effect';
    $password = 'effect0408';
    $options = array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    );
    $pdo = new PDO($dsn, $user, $password, $options);

    try {
        //  データベースの接続を試行する
        $pdo = new PDO($dsn, $user, $password);
    
        // データベースの接続に成功した場合の処理（例）
        echo 'データベースの接続に成功しました。'; 
    } catch (PDOException $e) {
        // データベースの接続に失敗した場合の処理 （例）
        exit($e->getMessage());
    }
    ?>