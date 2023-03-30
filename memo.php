<?php
// submitパラメータの値が存在するとき（「登録」ボタンを押したとき）の処理
if (isset($_POST['submit'])) {
    try {
        $pdo = new PDO($dsn, $user, $password);

        // 動的に変わる値をプレースホルダに置き換えたINSERT文をあらかじめ用意する
        $sql = '
            INSERT INTO `subject`( `subject_id`, `name`, `target_grade`,`weeks`,`times`)
            VALUES ( :subject_id, :name, :target_grade; weeks:, :times,)
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

        // header()関数を使ってselect.phpにリダイレクトさせる
        header('Location: select.php');
    } catch (PDOException $e) {
        exit($e->getMessage());
    }
}
?>
