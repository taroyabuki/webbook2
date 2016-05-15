<?php
//送信データがあるなら
if (isset($_POST['username'], $_POST['password'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
 
  //データベースに接続して検索
  $db = new PDO('mysql:host=localhost;dbname=mydb;charset=utf8', 'test', 'pass');
  $stmt = $db->prepare(
                  'SELECT username FROM user WHERE username=? AND password=SHA1(?)');
  $stmt->execute(array($username, $password));
 
  //ログイン成功なら
  if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    //セッションIDを再生成し，セッションにユーザ名を登録して転送
    session_start();
    session_regenerate_id();
    $_SESSION['username'] = $username;
    header("Location: secretform.php");
  }
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>ログイン</title>
  </head>
  <body>
    <h1>ログイン</h1>
    <form action="" method="post">
      <dl>
        <dt>ユーザ名</dt><dd><input type="text" name="username" /></dd>
        <dt>パスワード</dt><dd><input type="password" name="password" /></dd>
      </dl>
      <p><input type="submit" value="ログイン" /></p>
    </form>
  </body>
</html>