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
  $big_questions = $stmt->fetch(PDO::FETCH_ASSOC);

  $sql = 'SELECT * FROM questions INNER JOIN choices ON questions.big_question_id = ? AND questions.id = choices.question_id';
  $stmt = $pdo->prepare($sql);
  $stmt->execute([$id]);
  $all_choices = $stmt->fetchAll(PDO::FETCH_ASSOC);
  // print_r('<pre>');
  // print_r($all_choices);
  // print_r('</pre>');

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
  <title><?= $big_questions['pref_name'];?>の難読地名クイズ</title>
  <link rel="stylesheet" href="./style.css">
</head>
<body>
  <div class="wrapper">
    <div class = "content-wrapper" id="main">
      <h1 class="quiz-title box-container">ガチで<?= $big_questions['pref_name'];?>の人しか解けない！! #<?= $big_questions['pref_name'];?>の難読地名クイズ</h1>
      <?php for($i=0; $i < count($all_choices)/3; $i++) :?>
        <?php 
          $each_choices = array_slice($all_choices, $i*3, 3);
          shuffle($each_choices);
        ?>
      <section class="box-container">
          <h2><?= $i+1 ?>. この地名はなんて読む?</h2>
          <div class="image-container">
            <img src="./img/<?= $all_choices[$i*3]["img"] ?>" alt="地名画像">
          </div>
          <ul>
            <?php foreach ($each_choices as $each_choice) :?>
            <li value="<?= $each_choice["valid"] ?>"><?= $each_choice["name"] ?></li>
            <?php endforeach; ?>
          </ul>
      </section>
      <?php endfor; ?>
    </div>
  </div>
  <!-- <script src="./kuizy.js"></script> -->
</body>
</html>