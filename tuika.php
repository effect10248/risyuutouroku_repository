<!DOCTYPE html>
<?php
  $dsn = 'mysql:dbname=risyuutouroku;host=localhost;charset=utf8mb4';
  $user = 'root';
  // MAMPを利用しているMacユーザーの方は、''ではなく'root'を代入してください
  $password = 'root';
  $pdo = new PDO($dsn, $user, $password);

  $sql = "SELECT course_record_id, subject.name ,day_of_week, class_period FROM `course_records` INNER JOIN subject ON course_records.subject_id = subject.subject_id WHERE course_records.user_id = ? ORDER BY course_records.course_record_id DESC";

  $stmt = $pdo->prepare($sql);
  $user_id = 1;
  $stmt->bindValue(1, $user_id, PDO::PARAM_INT);
  // SQL文を実行する
  $stmt->execute();
  $course_records = $stmt->fetchAll(PDO::FETCH_ASSOC);
  

  function search_record($course_records, $day_of_week, $class_period) {
    for($i = 0; $i < count($course_records); $i++) {
      if (
        $course_records[$i]['day_of_week'] == $day_of_week
        && $course_records[$i]['class_period'] == $class_period
      ) {
        return $course_records[$i];
      }
    }
    return [];
  }

  function show_subject($record) {
    if (empty($record)) {
      return '';
    }
    return $record['name'];
  }
?>




<html lang="ja">
    <head>
        <title>履修登録 科目追加入力</title>
        <meta charset="utf-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    </head>
    <body>
        <div class="container">
            <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
              <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
                <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"/></svg>
              </a>
        
              <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
                <li><a href="#" class="nav-link px-2 link-secondary">トップページ</a></li>
                <li><a href="#" class="nav-link px-2 link-dark">お知らせ</a></li>
                <li><a href="#" class="nav-link px-2 link-dark">履修登録編集</a></li>
                <li><a href="kamokutouroku.html" class="nav-link px-2 link-dark">教員専用ページ</a></li>
                <li><a href="#" class="nav-link px-2 link-dark">カレンダー</a></li>
              </ul>
        
              <div class="col-md-3 text-end">
                <button type="button" class="btn btn-outline-primary me-2">Login</button>
                <button type="button" class="btn btn-primary">Sign-up</button>
              </div>
            </header>
        <!-- パンくずリスト -->
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">トップページ</a></li>
              <li class="breadcrumb-item active" aria-current="page">履修登録編集</li>
            </ol>
        </nav>
        <!-- ここにPHPで、クリックした日時に受講可能な科目を表示させる内容を記述 -->
        <h1>履修登録編集</h1>

          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">月</th>
                <th scope="col">火</th>
                <th scope="col">水</th>
                <th scope="col">木</th>
                <th scope="col">金</th>
                <th scope="col">土</th>
              </tr>
            </thead>
            <tbody>
            <tr>
                <th scope="row">1</th>
                <td><input class="chouse1 btn btn-primary modal-btn" type="button" value="追加" data-day-of-week="monday" data-class-period="1"><p class="subject"><?= show_subject(search_record($course_records, 'monday', 1)) ?></p></td>
                <td><input class="chouse2 btn btn-primary modal-btn" type="button" value="追加" data-day-of-week="tuesday" data-class-period="1"><p class="subject"><?= show_subject(search_record($course_records, 'tuesday', 1)) ?></p></td>
                <td><input class="chouse3 btn btn-primary modal-btn" type="button" value="追加" data-day-of-week="wednesday" data-class-period="1"><p class="subject"><?= show_subject(search_record($course_records, 'wednesday', 1)) ?></p></td>
                <td><input class="chouse4 btn btn-primary modal-btn" type="button" value="追加" data-day-of-week="thursday" data-class-period="1"><p class="subject"><?= show_subject(search_record($course_records, 'thursday', 1)) ?></p></td>
                <td><input class="chouse5 btn btn-primary modal-btn" type="button" value="追加" data-day-of-week="friday" data-class-period="1"><p class="subject"><?= show_subject(search_record($course_records, 'friday', 1)) ?></p></td>
                <td><input class="chouse6 btn btn-primary modal-btn" type="button" value="追加" data-day-of-week="saturday" data-class-period="1"><p class="subject"><?= show_subject(search_record($course_records, 'saturday', 1)) ?></p></td>
              </tr>

              <tr>
                <th scope="row">2</th>
                <td><input class="chouse7 btn btn-primary modal-btn" type="button" value="追加"data-day-of-week="monday" data-class-period="2"><p class="subject"><?= show_subject(search_record($course_records, 'monday', 2)) ?></p></td>
                <td><input class="chouse8 btn btn-primary modal-btn" type="button" value="追加"data-day-of-week="tuesday" data-class-period="2"><p class="subject"><?= show_subject(search_record($course_records, 'tuesday', 2)) ?></p></td>
                <td><input class="chouse9 btn btn-primary modal-btn" type="button" value="追加"data-day-of-week="wednesday" data-class-period="2"><p class="subject"><?= show_subject(search_record($course_records, 'wednesday', 2)) ?></p></td>
                <td><input class="chouse10 btn btn-primary modal-btn" type="button" value="追加"data-day-of-week="thursday" data-class-period="2"><p class="subject"><?= show_subject(search_record($course_records, 'thursday', 2)) ?></p></td>
                <td><input class="chouse11 btn btn-primary modal-btn" type="button" value="追加"data-day-of-week="friday" data-class-period="2"><p class="subject"><?= show_subject(search_record($course_records, 'friday', 2)) ?></p></td>
                <td><input class="chouse12 btn btn-primary modal-btn" type="button" value="追加"data-day-of-week="Saturday" data-class-period="2"><p class="subject"><?= show_subject(search_record($course_records, 'saturday', 2)) ?></p></td>
              </tr>
              <tr>
                <th scope="row">3</th>
                <td><input class="chouse13 btn btn-primary modal-btn" type="button" value="追加"data-day-of-week="monday" data-class-period="3"><p class="subject"><?= show_subject(search_record($course_records, 'monday', 3)) ?></p></td>
                <td><input class="chouse14 btn btn-primary modal-btn" type="button" value="追加"data-day-of-week="tuesday" data-class-period="3"><p class="subject"><?= show_subject(search_record($course_records, 'tuesday', 3)) ?></p></td>
                <td><input class="chouse15 btn btn-primary modal-btn" type="button" value="追加"data-day-of-week="wednesday" data-class-period="3"><p class="subject"><?= show_subject(search_record($course_records, 'wednesday', 3)) ?></p></td>
                <td><input class="chouse16 btn btn-primary modal-btn" type="button" value="追加"data-day-of-week="thursday" data-class-period="3"><p class="subject"><?= show_subject(search_record($course_records, 'thursday', 3)) ?></p></td>
                <td><input class="chouse17 btn btn-primary modal-btn" type="button" value="追加"data-day-of-week="friday" data-class-period="3"><p class="subject"><?= show_subject(search_record($course_records, 'friday', 3)) ?></p></td>
                <td><input class="chouse18 btn btn-primary modal-btn" type="button" value="追加"data-day-of-week="Saturday" data-class-period="3"><p class="subject"><?= show_subject(search_record($course_records, 'saturday', 3)) ?></p></td>
              </tr>
              <tr>
                <th scope="row">4</th>
                <td><input class="chouse19 btn btn-primary modal-btn" type="button" value="追加"data-day-of-week="monday" data-class-period="4"><p class="subject"><?= show_subject(search_record($course_records, 'monday', 4)) ?></p></td>
                <td><input class="chouse20 btn btn-primary modal-btn" type="button" value="追加"data-day-of-week="tuesday" data-class-period="4"><p class="subject"><?= show_subject(search_record($course_records, 'tuesday', 4)) ?></p></td>
                <td><input class="chouse21 btn btn-primary modal-btn" type="button" value="追加"data-day-of-week="wednesday" data-class-period="4"><p class="subject"><?= show_subject(search_record($course_records, 'wednesday', 4)) ?></p></td>
                <td><input class="chouse22 btn btn-primary modal-btn" type="button" value="追加"data-day-of-week="thursday" data-class-period="4"><p class="subject"><?= show_subject(search_record($course_records, 'thursday', 4)) ?></p></td>
                <td><input class="chouse23 btn btn-primary modal-btn" type="button" value="追加"data-day-of-week="friday" data-class-period="4"><p class="subject"><?= show_subject(search_record($course_records, 'friday', 4)) ?></p></td>
                <td><input class="chouse24 btn btn-primary modal-btn" type="button" value="追加"data-day-of-week="Saturday" data-class-period="4"><p class="subject"><?= show_subject(search_record($course_records, 'saturday', 4)) ?></p></td>
              </tr>
              <tr>
                <th scope="row">5</th>
                <td><input class="chouse25 btn btn-primary modal-btn" type="button" value="追加"data-day-of-week="monday" data-class-period="5"><p class="subject"><?= show_subject(search_record($course_records, 'monday', 5)) ?></p></td>
                <td><input class="chouse26 btn btn-primary modal-btn" type="button" value="追加"data-day-of-week="tuesday" data-class-period="5"><p class="subject"><?= show_subject(search_record($course_records, 'tuesday', 5)) ?></p></td>
                <td><input class="chouse27 btn btn-primary modal-btn" type="button" value="追加"data-day-of-week="wednesday" data-class-period="5"><p class="subject"><?= show_subject(search_record($course_records, 'wednesday', 5)) ?></p></td>
                <td><input class="chouse28 btn btn-primary modal-btn" type="button" value="追加"data-day-of-week="thursday" data-class-period="5"><p class="subject"><?= show_subject(search_record($course_records, 'thursday', 5)) ?></p></td>
                <td><input class="chouse29 btn btn-primary modal-btn" type="button" value="追加"data-day-of-week="friday" data-class-period="5"><p class="subject"><?= show_subject(search_record($course_records, 'friday', 5)) ?></p></td>
                <td><input class="chouse30 btn btn-primary modal-btn" type="button" value="追加"data-day-of-week="Saturday" data-class-period="5"><p class="subject"><?= show_subject(search_record($course_records, 'saturday', 5)) ?></p></td>
              </tr>
            </tbody>
          </table>
        </div>
        <!-- The Modal -->
        <div id="myModal" class="modal">
            <!-- Modal content -->
            <div class="modal-content">
                <span class="close">&times;</span>
                <ul>
                    <li><button class="subject-btn" data-subject-id="1002">芸術文化</button></li>
                    <li><button class="subject-btn" data-subject-id="1003">図書館サービス論</button></li>
                    <li><button class="subject-btn" data-subject-id="1004">言語学基礎</button></li>
                    <li><button class="subject-btn" data-subject-id="1005">日本語学入門</button></li>
                    <li><button class="subject-btn" data-subject-id="1006">学科ゼミ（1年）</button></li>
                    <li><button class="subject-btn" data-subject-id="1007">図書館概論</button></li>
                    <li><button class="subject-btn" data-subject-id="1008">博物館概論</button></li>
                    <li><button class="subject-btn" data-subject-id="1009">伝承文化研究</button></li>
                </ul>
            </div>
    
        </div>
        <footer class="footer">
            <div class="container">
              <p class="text-muted">@履修登録アプリ</p>
            </div>
        </footer> 

        <script>
            // モーダルウィンドウを取得する
            var modal = document.getElementById("myModal");
    
            // class="modal-btn"の要素を全て取得する
            var modalBtnList = document.querySelectorAll(".modal-btn");

            // class="close"がついた最初の要素を取得する
            var span = document.querySelector(".close");
    
            // class="subject-btn"がついた要素を全て取得する
            var subjectBtnList = document.querySelectorAll(".subject-btn");
    
            // クリックされた追加ボタンを保持する
            var activeBtn;
    
            // モーダルを開くクリックイベントを全てのボタンに付与する
            modalBtnList.forEach(btn => {
                btn.onclick = function (event) {
                    // クリックされたボタン情報を保存
                    activeBtn = event.target;
                    // モーダルを表示
                    modal.style.display = "block";
                }
            });
    
            // 科目ボタンにクリックイベントを付与する
            subjectBtnList.forEach(btn => {
                btn.onclick = function (event) {
                    const subject = activeBtn.parentElement.querySelector('.subject');
                    // クリックされた科目の内容を表示する
                    subject.textContent = event.target.textContent;
                    const subjectId = event.target.dataset.subjectId;
                    const dayOfWeek = activeBtn.dataset.dayOfWeek;
                    const classPeriod = activeBtn.dataset.classPeriod;
                    // データベースへの登録処理
                    const form = new FormData();
                    form.append('user_id', 1);
                    form.append('subject_id', subjectId);
                    form.append('day_of_week', dayOfWeek);
                    form.append('class_period', classPeriod);
                    fetch('/risyuutouroku_app/create_course_record.php', {
                      method: 'POST',
                      body: form
                    })
                      .then((response) => response.text())
                      .then((data) => console.log(data));
                    // モーダルを閉じる
                    modal.style.display = "none";
                }
            });
    
            // 閉じるボタンを押した時の処理
            span.onclick = function () {
                modal.style.display = "none";
            }
    
            // モーダル自体をクリックしたときに閉じる
            window.onclick = function (event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }
        </script>
    </body>
</html>

