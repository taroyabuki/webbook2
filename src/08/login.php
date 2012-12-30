<?php
//送信データがあるなら
if (isset($_POST['username'], $_POST['password'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
 
  //データベースに接続して検索
  $db = new PDO('mysql:host=localhost;dbname=mydb', 'test', 'pass',
                  array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
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

