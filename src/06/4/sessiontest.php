<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
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

