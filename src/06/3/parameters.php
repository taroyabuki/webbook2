<?php
$firstName = '';
$lastName = '';
if (isset($_GET['firstname'])) $firstName = $_GET['firstname'];
if (isset($_GET['lastname'])) $lastName = $_GET['lastname'];
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
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

