<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>PHPのセッション</title>
  </head>
  <body>
    <?php
    session_start(); //セッション開始
 
    $key = 'アクセス回数';
    $t = 1;
    if (isset($_SESSION[$key])) { //すでに記録がある
      $t = $_SESSION[$key] + 1; //アクセス回数を更新
    }
    $_SESSION[$key] = $t; //セッションに保管
    echo "${t}回目のアクセス";
    ?>
  </body>
</html>

