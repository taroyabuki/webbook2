<?php
//パラメータをテキストボックスに再現する準備
$paramq = '';
if (isset($_GET['q']))
  $paramq = htmlspecialchars($_GET['q'], ENT_QUOTES, 'UTF-8');
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>郵便番号検索フォーム</title>
  </head>
  <body>
    <form action="" method="get">
      <p>
        <input type="text" name="q" value='<?php echo $paramq; ?>'/>
        <input type="submit" value="search" />
      </p>
    </form>
<?php require('zips.php'); ?>
  </body>
</html>