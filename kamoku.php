<?php
var_dump($_POST);
"INSERT INTO `course_records`(`user_id`, `subject_id`, `day_of_week`, `class_period`) VALUES ('1','1','monday','1')";

$dsn = 'mysql:dbname=risyuutouroku;host=localhost;charset=utf8mb4';
$user = 'root';
// MAMPを利用しているMacユーザーの方は、''ではなく'root'を代入してください
$password = 'root';



// submitパラメータの値が存在するとき（「登録」ボタンを押したとき）の処理
if (isset($_POST['submit'])) {
    $pdo = new PDO($dsn, $user, $password);

    $sql = "INSERT INTO `course_records`(`user_id`, `subject_id`, `day_of_week`, `class_period`) VALUES ('1','1','monday','1')";
    $stmt = $pdo->prepare($sql);

    // SQL文を実行する
    $stmt->execute();
     // header()関数を使ってselect.phpにリダイレクトさせる
     header('Location: top.html');
    }
?>




<!DOCTYPE html>

<html>
    <head>
        <title>科目詳細</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="style.css">
    </head>

    <body>
         <h1><?php echo $_GET['subject']?></h1>
        <p>説明文</p>

        <?php
            

        ?>

        <!-- phpでvalueに可変で入るようにする 接続できるようにする-->
        <form action="kamoku.php" method="post">
            <input type="hidden" name="subject_id" value="2">
            <button class="modal-btn">編集に戻る</button></td>
            <button type="submit" name="submit" value="submit" class="modal-btn">登録する</button></td></form>
    </body>
</html>