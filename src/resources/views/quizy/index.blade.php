<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{$prefecture[0]->getData()['pref_name']}}の難読地名クイズ</title>
  <link rel="stylesheet" href="/css/reset.css">
  <link rel="stylesheet" href="/css/style.css">
</head>
<body>
  <div class="wrapper">
    <div class = "content-wrapper" id="main">
      <h1 class="quiz-title box-container">ガチで{{$prefecture[0]->getData()['pref_name']}}の人しか解けない！! #{{$prefecture[0]->getData()['pref_name']}}の難読地名クイズ</h1>
      @foreach ($prefecture[0]->questions as $question)
      <section class="box-container">
          <h2>{{$loop->index + 1}}. この地名はなんて読む?</h2>
          <div class="image-container">
            <img src="/img/{{$question->img}}" alt="地名画像">
          </div>
          <ul>
            @foreach ($question->choices as $choice)
            <li value="{{$choice->valid}}">{{$choice->name}}</li>
            @endforeach
          </ul>
      </section>
      @endforeach
    </div>
  </div>
</body>
</html>