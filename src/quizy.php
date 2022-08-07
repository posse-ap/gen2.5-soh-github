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
  $result = $stmt->fetch(PDO::FETCH_ASSOC);
  // var_dump($result);
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
  <title><?= $result['pref_name'];?>の難読地名クイズ</title>
  <link rel="stylesheet" href="./style.css">
</head>
<body>
  <div class="wrapper">
    <div class = "content-wrapper" id="main">
      <h1 class="quiz-title box-container">ガチで東京の人しか解けない！! #東京の難読地名クイズ</h1>
    </div>
  </div>
  <script src="./kuizy.js"></script>
</body>
</html>