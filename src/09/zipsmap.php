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
    <style type="text/css">
      html, body { height: 100%; }
      td { font-size: smaller; }
    </style>
    <script src="http://maps.google.com/maps/api/js"></script>
    <!-- jQueryの読み込み（書籍の記法は最新のjQueryに対応しません。） -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
    <script src="addressmaps.js"></script>
    <script>
      $(document).ready(function() {
        var address = $(".address:first").text();
        drawMap(address); // 地図を生成する
      });
    </script>
    <title>郵便番号検索フォームとGoogle Maps APIのマッシュアップ</title>
  </head>
  <body>
    <form action="" method="get">
      <p>
        <input type="text" name="q" value='<?php echo $paramq; ?>'/>
        <input type="submit" value="search" />
      </p>
    </form>
    <div id="map_canvas" style="float: right; width: 50%; height: 90%;"></div>
    <?php require('zips.php'); ?>
  </body>
</html>