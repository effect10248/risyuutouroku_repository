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


<!-- The Modal -->
<div id="myModal" class="modal">
    <!-- Modal content -->
    <div class="modal-content">
        <span class="close">&times;</span>
        <ul>
            <li><a href="kamoku2.php?subject=文学研究1"><button class="subject-btn">文学研究1</button></a></li>
            <li><a href="kamoku2.php?subject=文章表現法1"><button class="subject-btn">文章表現法1</button></li>
            <li><a href="kamoku2.php?subject=国語科教育法"><button class="subject-btn">国語科教育法</button></li>
            <li><a href="kamoku2.php?subject=英米文学1"><button class="subject-btn">英米文学1</button></li>
            <li><a href="kamoku2.php?subject=日本史論"><button class="subject-btn">日本史論</button></li>
            <li><a href="kamoku2.php?subject=図書館サービス論"><button class="subject-btn">図書館サービス論</button></li>
            <li><a href="kamoku2.php?subject=博物館概論"><button class="subject-btn">博物館概論</button></li>
            <li><a href="kamoku2.php?subject=学科ゼミ1"><button class="subject-btn">学科ゼミ1</button></li>
        </ul>
    </div>
</div>

<script>
    // モーダルウィンドウを取得する
    var modal = document.getElementById("myModal");

    // class="chouse"の要素を全て取得する
    var chouseList = document.querySelectorAll(".chouse1, .chouse2, .chouse3, .chouse4, .chouse5, .chouse6, .chouse7, .chouse8, .chouse9, .chouse10, .chouse11, .chouse12, .chouse13, .chouse14, .chouse15, .chouse16, .chouse17, .chouse18, .chouse19, .chouse20, .chouse21, .chouse22, .chouse23, .chouse24, .chouse25, .chouse26, .chouse27, .chouse28, .chouse29, .chouse30");

    // class="close"がついた最初の要素を取得する
    var span = document.querySelector(".close");

    // class="subject-btn"がついた要素を全て取得する
    var subjectBtnList = document.querySelectorAll(".subject-btn");

    // クリックされたモーダルボタンを保持する
    var activeBtn;

    // モーダルを開くクリックイベントを全てのボタンに付与する
    chouseBtnList.forEach(btn => {
    btn.onclick = function (event) {
        // クリックされたボタン情報を保存
        activeBtn = event.target;
        // モーダルを表示
        modal.style.display = "block";
        }
    });

// テーブル内のボタン要素を全て取得する
const chouseBtnList = document.querySelectorAll("table input[type='button']");

// テーブル内のボタン要素を全てにクリックイベントを付与する
chouseBtnList.forEach(btn => {
  btn.onclick = function() {
    // モーダルウィンドウを表示する
    modal.style.display = "block";
  }
});


// もとのこーどはこちら
// <!-- The Modal -->
//         <div id="myModal" class="modal">
//             <!-- Modal content -->
//             <div class="modal-content">
//                 <span class="close">&times;</span>
//                 <ul>
//                     <li><a href="kamoku2.php?subject=文学研究1"><button class="subject-btn">文学研究1</button></a></li>
//                     <li><a href="kamoku2.php?subject=文章表現法1"><button class="subject-btn">文章表現法1</button></li>
//                     <li><a href="kamoku2.php?subject=国語科教育法"><button class="subject-btn">国語科教育法</button></li>
//                     <li><a href="kamoku2.php?subject=英米文学1"><button class="subject-btn">英米文学1</button></li>
//                     <li><a href="kamoku2.php?subject=日本史論"><button class="subject-btn">日本史論</button></li>
//                     <li><a href="kamoku2.php?subject=図書館サービス論"><button class="subject-btn">図書館サービス論</button></li>
//                     <li><a href="kamoku2.php?subject=博物館概論"><button class="subject-btn">博物館概論</button></li>
//                     <li><a href="kamoku2.php?subject=学科ゼミ1"><button class="subject-btn">学科ゼミ1</button></li>
//                 </ul>
//             </div>
    
//         </div>
//         <script>
//             // モーダルウィンドウを取得する
//             var modal = document.getElementById("myModal");
    
//             // class="modal-btn"の要素を全て取得する
//             var modalBtnList = document.querySelectorAll(".modal-btn");
    
//             // class="close"がついた最初の要素を取得する
//             var span = document.querySelector(".close");
    
//             // class="subject-btn"がついた要素を全て取得する
//             var subjectBtnList = document.querySelectorAll(".subject-btn");
    
//             // クリックされたモーダルボタンを保持する
//             var activeBtn;
    
//             // モーダルを開くクリックイベントを全てのボタンに付与する
//             modalBtnList.forEach(btn => {
//                 btn.onclick = function (event) {
//                     // クリックされたボタン情報を保存
//                     activeBtn = event.target;
//                     // モーダルを表示
//                     modal.style.display = "block";
//                 }
//             });
    
//             // 科目ボタンにクリックイベントを付与する
//             subjectBtnList.forEach(btn => {
//                 btn.onclick = function (event) {
//                     // モーダルのボタンのテキストを更新
//                     activeBtn.textContent = event.target.textContent;
//                     // モーダルを閉じる
//                     modal.style.display = "none";
//                 }
//             });
    
//             // 閉じるボタンを押した時の処理
//             span.onclick = function () {
//                 modal.style.display = "none";
//             }
    
//             // モーダル自体をクリックしたときに閉じる
//             window.onclick = function (event) {
//                 if (event.target == modal) {
//                     modal.style.display = "none";
//                 }
//             }
//         </script>