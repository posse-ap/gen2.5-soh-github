<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hello/Index</title>
  <style>
    body {font-size: 16pt; color:#999;}
    h1 {font-size:100pt; text-align:right; color:#eee; margin: -40px 0px -50px 0px;}
  </style>
</head>
<body>
  <h1>Blade/Index</h1>
  @if ($msg != '')
  <p>こんにちは、{{$msg}}さん！</p>
  @else
  <p>何か書いてください。</p>
  @endif
  <form action="/hello" method="post">
    @csrf
    <input type="text" name="msg" id="">
    <input type="submit">
  </form>
</body>
</html>