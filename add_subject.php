<?php
// データベース接続情報
$servername = "mysql1.php.xdomain.ne.jp";
$username = "orijinaru_db1";
$password = "effect0408";
$dbname = "risyuutouroku";

// データベースに接続
$dsn = 'mysql:host=mysql1.php.xdomain.ne.jp;dbname=orijinaru_db1;charset=utf8';
 $user = 'orijinaru_effect';
// MAMPを利用しているMacユーザーの方は、''ではなく'root'を代入してください
 $password = 'effect0408';

 $pdo = new PDO($dsn, $user, $password);


 // submitパラメータの値が存在するとき（「登録」ボタンを押したとき）の処理
 if (isset($_POST['submit'])) {
     try {
         $pdo = new PDO($dsn, $user, $password);
 
         // 動的に変わる値をプレースホルダに置き換えたINSERT文をあらかじめ用意する
         $sql = '
             INSERT INTO `subject`( `subject_id`, `name`, `target_grade`,`acquired`,`weeks`,`times`)
             VALUES ( :subject_id, :name, :target_grade, :acquired, :weeks, :times)
         ';
         $stmt = $pdo->prepare($sql);
 
         // bindValue()メソッドを使って実際の値をプレースホルダにバインドする（割り当てる）
         $stmt->bindValue(':subject_id', $_POST['subject_id'], PDO::PARAM_INT);
         $stmt->bindValue(':name', $_POST['name'], PDO::PARAM_STR);
         $stmt->bindValue(':target_grade', $_POST['target_grade'], PDO::PARAM_INT);
         $stmt->bindValue(':acquired', $_POST['acquired'], PDO::PARAM_INT);
         $stmt->bindValue(':weeks', $_POST['weeks'], PDO::PARAM_STR);
         $stmt->bindValue(':times', $_POST['times'], PDO::PARAM_INT);
 
         // SQL文を実行する
         $stmt->execute();
 
         // header()関数を使って各ページ？にリダイレクトさせる
         
     } catch (PDOException $e) {
         exit($e->getMessage());
     }

     // SQL文を実行
    if ($stmt->execute()) {
        echo "科目が登録されました。<br>";
        echo '<a href="top.html">トップページへ戻る</a>';
        echo "<br>";
        echo '<a href="kamokutouroku.html">科目追加へ戻る</a>';

    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
 }
 
?>
