<?php
//送信データがあるなら
if (isset($_POST['username'], $_POST['message'])) {
  //送信データの取得
  $username = $_POST['username'];
  $message = $_POST['message'];
 
  //データベースに接続
  $db = new PDO('mysql:host=localhost;dbname=mydb;charset=utf8', 'test', 'pass');
 
  //SQL文の作成
  $stmt = $db->prepare('INSERT INTO message (name,body) VALUES (?,?)');
 
  //SQL文の実行
  $stmt->execute(array($username, $message));
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>メッセージ登録フォーム</title>
  </head>
  <body>
    <h1>メッセージ登録フォーム</h1>
    <form action="" method="post">
      <dl>
        <dt>名前</dt><dd><input type="text" name="username" /></dd>
        <dt>メッセージ</dt><dd><textarea name="message" rows="3" cols="30"></textarea></dd>
      </dl>
      <p><input type="submit" value="送信" /></p>
    </form>
  </body>
</html>