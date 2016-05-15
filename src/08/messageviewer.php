<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>メッセージ一覧</title>
  </head>
  <body>
    <h1>メッセージ一覧</h1>
    <dl>
      <?php
      //データベースに接続
      $db = new PDO('mysql:host=localhost;dbname=mydb;charset=utf8', 'test', 'pass');
 
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