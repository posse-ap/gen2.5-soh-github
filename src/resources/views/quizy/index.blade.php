<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{$prefecture}}の難読地名クイズ</title>
  <link rel="stylesheet" href="/css/reset.css">
  <link rel="stylesheet" href="/css/style.css">
</head>
<body>
  <div class="wrapper">
    <div class = "content-wrapper" id="main">
      <h1 class="quiz-title box-container">ガチで{{$prefecture}}の人しか解けない！! #{{$prefecture}}の難読地名クイズ</h1>
      <?php for($i=0; $i < 3; $i++) :?>
      <section class="box-container">
          <h2><?= $i+1 ?>. この地名はなんて読む?</h2>
          <div class="image-container">
            <img src="" alt="地名画像">
          </div>
          <ul>
            <li value="a">ああ1</li>
            <li value="a">ああ2</li>
            <li value="a">ああ3</li>
          </ul>
      </section>
      <?php endfor; ?>
    </div>
  </div>
</body>
</html>