<?php
// データベース接続情報
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "risyuutouroku";

// データベースに接続
$dsn = 'mysql:dbname=course_record;host=localhost;charset=utf8mb4';
 $user = 'root';
// MAMPを利用しているMacユーザーの方は、''ではなく'root'を代入してください
 $password = 'root';

 $pdo = new PDO($dsn, $user, $password);

// 接続エラーの確認
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// フォームから送信されたデータを取得
$subject_id = $_POST["subject_id"];
$name = $_POST["name"];
$target_grade = $_POST["target_grade"];
$acquired = $_POST["acquired"];
$weeks = $_POST["weeks"];
$times = $_POST["times"];

// SQL文を準備
$sql = "INSERT INTO subject (subject_id, name, target_grade, acquired, weeks, times)
VALUES (?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ssiiis", $subject_id, $name, $target_grade, $acquired, $weeks, $times);

// SQL文を実行
if ($stmt->execute()) {
    echo "科目が登録されました。<br>";
    echo '<a href="top.html">トップページへ戻る</a>';
    echo "<br>";
    echo '<a href="kamokutouroku.html">科目追加へ戻る</a>';

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


// 接続を閉じる
$stmt->close();
$conn->close();
?>
