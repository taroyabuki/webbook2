<?php
$firstName = '';
$lastName = '';
if (isset($_GET['firstname'])) $firstName = $_GET['firstname'];
if (isset($_GET['lastname'])) $lastName = $_GET['lastname'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>リクエスト内容の取得</title>
  </head>
  <body>
    <?php
    echo '<dl>';
    echo '<dt>First Name</dt>';
    echo '<dd>' . htmlspecialchars($firstName, ENT_QUOTES, 'UTF-8') . '</dd>';
    echo '<dt>Last Name</dt>';
    echo '<dd>' . htmlspecialchars($lastName, ENT_QUOTES, 'UTF-8') . '</dd>';
    echo '</dl>';
    ?>
  </body>
</html>

