<?php
"INSERT INTO `course_records`(`user_id`, `subject_id`, `day_of_week`, `class_period`) VALUES ('1','1','monday','1')";

$dsn = 'mysql:dbname=risyuutouroku;host=localhost;charset=utf8mb4';
$user = 'root';
// MAMPを利用しているMacユーザーの方は、''ではなく'root'を代入してください
$password = 'root';

// submitパラメータの値が存在するとき（「登録」ボタンを押したとき）の処理
if (!empty($_POST)) {
    $pdo = new PDO($dsn, $user, $password);

    $sql = "INSERT INTO `course_records`(`user_id`, `subject_id`, `day_of_week`, `class_period`) VALUES (?,?,?,?)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(1, $_POST['user_id'], PDO::PARAM_INT);
    $stmt->bindValue(2, $_POST['subject_id'], PDO::PARAM_INT);
    $stmt->bindValue(3, $_POST['day_of_week'], PDO::PARAM_STR);
    $stmt->bindValue(4, $_POST['class_period'], PDO::PARAM_INT);

    // SQL文を実行する
    $stmt->execute();
    }
?>
