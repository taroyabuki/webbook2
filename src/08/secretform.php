<?php
//セッションからusernameを取り出す．無かったらログイン画面へ転送
session_start();
if (!isset($_SESSION['username'])) {
  header('Location: login.php');
  exit;
}
$username = $_SESSION['username'];
 
//送信データがあるなら，データベースに登録
if (isset($_POST['message'])) {
  $db = new PDO('mysql:host=localhost;dbname=mydb', 'test', 'pass',
                  array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
  $stmt = $db->prepare('INSERT INTO message (name,body) VALUES (?,?)');
  $stmt->execute(array($username, $_POST['message']));
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>メッセージアプリ</title>
  </head>
  <body>
    <h1>メッセージアプリ</h1>
    <p><?php echo $username; ?>としてログインしています．<a href="logout.php">ログアウト</a></p>
    <h2>メッセージ登録</h2>
    <form action="" method="post">
      <p>
        <textarea name="message" rows="3" cols="30"></textarea>
        <input type="submit" value="送信" />
      </p>
    </form>
  </body>
</html>