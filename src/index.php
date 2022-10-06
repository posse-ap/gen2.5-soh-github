<?php

require_once(dirname(__FILE__) . '/dbconnect.php');

// 学習時間表示（today/month/total）
$sql = 'SELECT sum(learned_hour) FROM learned_history WHERE learned_date = CURRENT_DATE()';
//確認用↓
// $sql = "SELECT sum(learned_hour) FROM learned_history WHERE learned_date = '2022-09-03'";
$stmt = $db->query($sql);
$today = $stmt->fetch();

$sql = "SELECT sum(learned_hour) FROM learned_history WHERE DATE_FORMAT(learned_date, '%Y%m') = DATE_FORMAT(NOW(), '%Y%m')";
//確認用↓
// $sql = "SELECT sum(learned_hour) FROM learned_history WHERE DATE_FORMAT(learned_date, '%Y%m') = DATE_FORMAT('2022-09-03', '%Y%m')";
$stmt = $db->query($sql);
$month = $stmt->fetch();

$sql = "SELECT sum(learned_hour) FROM learned_history";
$stmt = $db->query($sql);
$total = $stmt->fetch();

// 棒グラフ
$sql = "SELECT DAY(learned_date) day, learned_hour hour FROM learned_history WHERE DATE_FORMAT(learned_date, '%Y%m') = DATE_FORMAT(NOW(), '%Y%m')";
//確認用↓
// $sql = "SELECT DAY(learned_date) day, learned_hour hour FROM learned_history WHERE DATE_FORMAT(learned_date, '%Y%m') = DATE_FORMAT('2022-09-03', '%Y%m')";
$stmt = $db->query($sql);
$bar_data = $stmt->fetchAll();
// print_r('<pre>');
// print_r($bar_data);
// print_r('</pre>');

$bar_data = json_encode($bar_data);

?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>web-app</title>
  <!-- リセットcss -->
  <link href="https://unpkg.com/sanitize.css" rel="stylesheet" />
  <!-- font awesome -->
  <script src="https://kit.fontawesome.com/3ded641fb3.js" crossorigin="anonymous"></script>
  <!-- flatpickr -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/themes/material_blue.css">
  <!-- My css -->
  <link rel="stylesheet" href="./css/index.min.css">
</head>

<body>
  <header>
    <div class="headerInner">
      <div class="posseLogo"><img src="https://github.com/posse-ap/gen1.5-takanashiayane/blob/ph2-posseapp-develop/web%E3%82%A2%E3%83%97%E3%83%AA/src/img/posselogoss.png?raw=true" alt="POSSE">
      </div>
      <a href="#modal-01" class="postButton" id="modal-trigger">記録・投稿</a>
      <!-- modal -->
      <div class="modalWrapper" id="modal-01">
        <a href="#!" class="modalOverlay"></a>
        <div class="modalWindow">
          <!-- modalコンテンツ -->
          <div class="modalContent">
            <div class="modalLeft">
              <div class="lerningDate">
                <div class="modalContentsTitle">学習日</div>
                <input type="text" class="textInput" name="学習日" id="study-date">
              </div>
              <div class="lernigContent">
                <div class="modalContentsTitle">学習コンテンツ（複数選択可）</div>
                <div class="checkbox">
                  <div class="testbox testbox-bg" id="nyobi">
                    <input type="checkbox" name="contentsBox" value="1" id="N予備校"><label for="N予備校"><i class="checkcircle-color fa-solid fa-circle-check fa-lg fa-fw"></i>N予備校</label>
                  </div>
                  <div class="testbox testbox-bg">
                    <input type="checkbox" name="contentsBox" value="1" id="ドットインストール"><label for="ドットインストール"><i class="fa-solid fa-circle-check fa-lg checkcircle-color fa-fw"></i>ドットインストール</label>
                  </div>
                  <div class="testbox testbox-bg">
                    <input type="checkbox" name="contentsBox" value="1" id="POSSE課題"><label for="POSSE課題"><i class="fa-solid fa-circle-check fa-lg checkcircle-color fa-fw"></i>POSSE課題</label>
                  </div>
                </div>
              </div>
              <div class="lernigLang">
                <div class="modalContentsTitle">学習言語（複数選択可）</div>
                <div class="checkbox">
                  <div class="testbox testbox-bg"><input type="checkbox" name="langsBox" value="1" id="html"><label for="html"><i class="fa-solid fa-circle-check fa-lg checkcircle-color fa-fw"></i>HTML</label></div>
                  <div class="testbox testbox-bg"><input type="checkbox" name="langsBox" value="1" id="css"><label for="css"><i class="fa-solid fa-circle-check fa-lg checkcircle-color fa-fw"></i>css</label></div>
                  <div class="testbox testbox-bg"><input type="checkbox" name="langsBox" value="1" id="javascript"><label for="javascript"><i class="fa-solid fa-circle-check fa-lg checkcircle-color fa-fw"></i>JavaScript</label></div>
                  <div class="testbox testbox-bg"><input type="checkbox" name="langsBox" value="1" id="PHP"><label for="PHP"><i class="fa-solid fa-circle-check fa-lg checkcircle-color fa-fw"></i>PHP</label></div>
                  <div class="testbox testbox-bg"><input type="checkbox" name="langsBox" value="1" id="Laravel"><label for="Laravel"><i class="fa-solid fa-circle-check fa-lg checkcircle-color fa-fw"></i>Laravel</label></div>
                  <div class="testbox testbox-bg"><input type="checkbox" name="langsBox" value="1" id="SQL"><label for="SQL"><i class="fa-solid fa-circle-check fa-lg checkcircle-color fa-fw"></i>SQL</label></div>
                  <div class="testbox testbox-bg"><input type="checkbox" name="langsBox" value="1" id="SHELL"><label for="SHELL"><i class="fa-solid fa-circle-check fa-lg checkcircle-color fa-fw"></i>SHELL</label></div>
                  <div class="testbox testbox-bg"><input type="checkbox" name="langsBox" value="1" id="情報システム基礎知識（その他）"><label for="情報システム基礎知識（その他）"><i class="fa-solid fa-circle-check fa-lg checkcircle-color fa-fw"></i>情報システム基礎知識（その他）</label></div>
                </div>
              </div>
            </div>
            <div class="modalRight">
              <div class="lerningTime">
                <div class="modalContentsTitle">学習時間</div>
                <input type="text" class="textInput" name="学習時間">
              </div>
              <div class="tweetComent">
                <div class="modalContentsTitle">Twitter用コメント</div>
                <textarea name="tweet" class="areaInput" id="tweetText" cols="30" rows="10"></textarea>
              </div>
              <div class="tweetButton">

                <input type="checkbox" name="tweetBox" id="tweetBox" value="1"><label for="tweetBox" style="vertical-align: middle;"><i class="fa-solid fa-circle-check fa-2x checkcircle-color fa-fw"></i>Twitterにシェアする</label>
              </div>
            </div>
          </div>
          <div class="modalPost">記録・投稿</div>
          <!-- 投稿完了 -->
          <div class="completeContainer">
            <!-- Loading -->
            <div class="loadingContainer">
              <div class="laodingCircle"></div>
            </div>
            <!-- Awesome -->
            <div class="completeIconWrapper"><i class="fa-solid fa-circle-check fa-5x awesomeColor"></i></div>
            <p class="completeText">記録・投稿<br>完了しました</p>
          </div>
          <a href="#!" class="modalClose">×</a>
        </div>
      </div>
      <!-- modalここまで -->
    </div>
  </header>
  <main>
    <div class="mainInner">
      <div class="mainLeft">
        <div class="hours">
          <div class="todayBox">
            <div class="period">Today</div>
            <div class="time"><?= (int)$today['sum(learned_hour)'] ?? 0;?></div>
            <div class="hour">hour</div>
          </div>
          <div class="monthBox">
            <div class="period">Month</div>
            <div class="time"><?= (int)$month['sum(learned_hour)'] ?? 0;?></div>
            <div class="hour">hour</div>
          </div>
          <div class="totalBox">
            <div class="period">Total</div>
            <div class="time"><?= (int)$total['sum(learned_hour)'] ?? 0;?></div>
            <div class="hour">hour</div>
          </div>
        </div>
        <div class="graph" id="time-graph"></div>
      </div>
      <div class="mainRight">
        <div class="lang">
          <div class="contentTitle">学習言語</div>
          <div class="chart" id="lang-chart"></div>
          <ul class="legends">
            <li class="legend1">JavaScript</li>
            <li class="legend2">CSS</li>
            <li class="legend3">PHP</li>
            <li class="legend4">HTML</li>
            <li class="legend5">Laravel</li>
            <li class="legend6">SQL</li>
            <li class="legend7">SHELL</li>
            <li class="legend8">情報システム基礎知識（その他）</li>
          </ul>
        </div>
        <div class="contents">
          <div class="contentTitle">学習コンテンツ</div>
          <div class="chart" id="contents-chart"></div>
          <ul class="legends">
            <li class="legend1">ドットインストール</li>
            <li class="legend2">N予備校</li>
            <li class="legend3">POSSE課題</li>
          </ul>
        </div>
      </div>
    </div>
    <div class="footerMonthWrapper">
      <button id="prevBtn" class="footerBtn"><i class="fa-solid fa-angle-left fa-2x period"></i></button>
      <div class="footerMonth"><?= date('Y');?>年<?= date('n');?>月</div>
      <button id="nextBtn" class="footerBtn"><i class="fa-solid fa-angle-right fa-2x period"></i></button>
    </div>
    <a href="#modal-01" class="postButton" id="modal-trigger2">記録・投稿</a>
  </main>
  <script>
    let bar_data = <?= $bar_data?>;  //index.jsへのデータ受け渡し
  </script>
  <script src="https://www.gstatic.com/charts/loader.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
  <script src="./js/jquery-3.5.1.min.js"></script>
  <script src="./js/index.js"></script>
</body>

</html>