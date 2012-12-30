<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>メッセージ一覧</title>
  </head>
  <body>
    <h1>メッセージ一覧</h1>
    <dl>
      <?php
      //データベースに接続
      $db = new PDO('mysql:host=localhost;dbname=mydb', 'test', 'pass',
                      array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
 
      //データベースのデータを取得
      $stmt = $db->prepare('SELECT name,body FROM message ORDER BY id DESC');
      $stmt->execute();
 
      //結果を1件ずつ処理する
      while ($row = $stmt->fetch()) {
        $name = htmlspecialchars($row['name']);
        $body = htmlspecialchars($row['body']);
        $body = str_replace("\n", '<br />', $body);
        echo "<dt>$name</dt>";
        echo "<dd>$body</dd>";
      }
      ?>
    </dl>
  </body>
</html>

