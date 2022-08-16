<?php

$id = filter_input(INPUT_GET, 'id');

if(empty($id)){
  header("HTTP/1.1 404 Not Found");
  include ('index.php');
  exit;
}


try {
  $dsn = 'mysql:host=db;dbname=quizy_db;';
  $pdo = new PDO($dsn,'root','root');

  $sql = 'SELECT pref_name FROM big_questions WHERE id = ?';
  $stmt = $pdo->prepare($sql);
  $stmt->execute([$id]);
  $bq = $stmt->fetch(PDO::FETCH_ASSOC);

  $sql = 'SELECT * FROM questions WHERE big_question_id = ?';
  $stmt = $pdo->prepare($sql);
  $stmt->execute([$id]);
  $questions = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
  echo $e->getMessage();
  exit;
}


?>



<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $bq['pref_name'];?>の難読地名クイズ</title>
  <link rel="stylesheet" href="./style.css">
</head>
<body>
  <div class="wrapper">
    <div class = "content-wrapper" id="main">
      <h1 class="quiz-title box-container">ガチで<?= $bq['pref_name'];?>の人しか解けない！! #<?= $bq['pref_name'];?>の難読地名クイズ</h1>
      <?php foreach($questions as $index => $question) :?>
      <section class="box-container">
          <h2><?= $index+1 ?>. この地名はなんて読む?</h2>
          <div class="image-container">
            <img src="./img/<?= $question["img"] ?>" alt="地名画像">
          </div>
          <ul>
            <?php
              $sql = 'SELECT * FROM choices WHERE question_id = ?';
              $stmt = $pdo->prepare($sql);
              $stmt->execute([$question["id"]]);
              $choices = $stmt->fetchAll(PDO::FETCH_ASSOC);
              foreach ($choices as $choice) :
            ?>
            <li value="<?= $choice["valid"] ?>"><?= $choice["name"] ?></li>
            <?php endforeach; ?>
          </ul>
      </section>
      <?php endforeach; ?>
    </div>
  </div>
  <!-- <script src="./kuizy.js"></script> -->
</body>
</html>