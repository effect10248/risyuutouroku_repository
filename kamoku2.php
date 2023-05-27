<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>科目情報</title>
</head>
<body>
    <?php
    // データベースに接続する
    $dsn = 'mysql:host=localhost;dbname=risyuutouroku;charset=utf8mb4';
    $user = 'root';
    $password = 'root';
    $options = array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    );
    $pdo = new PDO($dsn, $user, $password, $options);

    // subject_idを取得
    $subject = filter_input(INPUT_GET, 'subject', FILTER_SANITIZE_STRING);

    // subjectテーブルから情報を取得
    $stmt = $pdo->prepare('SELECT * FROM subject WHERE name = ?');
    $stmt->execute(array($subject));
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    // h1タグに情報を表示
    echo '<h1>';

    // subjectが配列であるかを確認し、配列であればループして値を出力する
    if (is_array($subject)) {
        foreach ($subject as $value) {
            echo htmlspecialchars($value, ENT_QUOTES, 'UTF-8') . ' ';
        }
    } else {
        echo htmlspecialchars($subject, ENT_QUOTES, 'UTF-8');
    }

    // subjectテーブルの情報が取得できているか確認し、要素が定義されている場合のみh1タグに情報を追加する
    if ($row !== false) {
        echo ' 科目ID: ' . htmlspecialchars($row['subject_id'], ENT_QUOTES, 'UTF-8') . ' 対象学年: ' . htmlspecialchars($row['target_grade'], ENT_QUOTES, 'UTF-8') . ' 取得単位数: ' . htmlspecialchars($row['acquired'], ENT_QUOTES, 'UTF-8');
    }

    echo '</h1>';
    ?>

    <form method="POST" action="register.php">
    <input type="hidden" name="subject" value="<?php echo htmlspecialchars($subject, ENT_QUOTES, 'UTF-8'); ?>">
    <input type="submit" value="登録">
    </form>


</body>
</html>

<!-- 最初から入力されている状態を作るとよい -->