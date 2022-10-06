
<?php
$dsn = 'mysql:host=db;dbname=webapp_db;charset=utf8;';
$user = 'root';
$password = 'root';

try {
  $db = new PDO($dsn, $user, $password);
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
  echo '接続失敗: ' . $e->getMessage();
  exit();
}