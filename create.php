<?php

 $dsn = 'mysql:dbname=course_record;host=localhost;charset=utf8mb4';
 $user = 'root';
// MAMPを利用しているMacユーザーの方は、''ではなく'root'を代入してください
 $password = 'root';
 
 // submitパラメータの値が存在するとき（「登録」ボタンを押したとき）の処理
 if (isset($_POST['submit'])) {
     try {
         $pdo = new PDO($dsn, $user, $password);
 
         // 動的に変わる値をプレースホルダに置き換えたINSERT文をあらかじめ用意する
         $sql = '
             INSERT INTO `course_records`(`user_id`, `subject_id`, `day_of_week`, `class_period`) 
             VALUES (:user_id, :subject_id, :day_of_week, :class_period)
         ';
         $stmt = $pdo->prepare($sql);
 
         // bindValue()メソッドを使って実際の値をプレースホルダにバインドする（割り当てる）
         $stmt->bindValue(':user_id', 1, PDO::PARAM_INT);
         $stmt->bindValue(':subject_id', $_POST['subject_id'], PDO::PARAM_INT);
         $stmt->bindValue(':day_of_week', $_POST['day_of_week'], PDO::PARAM_STR);
         $stmt->bindValue(':class_period', $_POST['class_period'], PDO::PARAM_INT);
 
         // SQL文を実行する
         $stmt->execute();
 
         // header()関数を使ってselect.phpにリダイレクトさせる
         header('Location: select.php');
     } catch (PDOException $e) {
         exit($e->getMessage());
     }
 }
 ?>
<!DOCTYPE html>
 <html lang="ja">
 
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>履修登録</title>
     <link rel="stylesheet" href="css/style.css">
 </head>
 
 <body>
     <h1>履修登録</h1>
     <p>履修情報を入力してください。</p>
     <form action="create_course.php" method="post">
         <div>
             <label for="subject_id">科目<span>【必須】</span></label>
             <input type="text" name="subject_id" maxlength="60" required>
 
             <label for="day_of_week">曜日<span>【必須】</span></label>
             <input type="text" name="day_of_week" maxlength="255" required>
 
             <label for="class_period">時限</label>
             <input type="number" name="class_period">
         </div>
         <button type="submit" name="submit" value="insert">登録</button>
     </form>
 </body>
 
 </html>
