<?php
//パラメータをテキストボックスに再現する準備
$paramq = '';
if (isset($_GET['q']))
  $paramq = htmlspecialchars($_GET['q'], ENT_QUOTES, 'UTF-8');
?>
<html>
  <head>
    <meta charset="utf-8" />
    <style type="text/css">
      html, body { height: 100%; }
      td { font-size: smaller; }
    </style>
    <script src="http://maps.google.com/maps/api/js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
    <script src="zipsmap2.js"></script>
    <title>リアルタイム郵便番号検索2</title>
  </head>
  <body>
    <form action="" method="get">
      <p>
        <input type="text" name="q" value='<?php echo $paramq; ?>'/>
        <input type="submit" value="search" />
      </p>
    </form>
    <div id="map_canvas" style="float:left; width:500px; height:500px;"></div>
    <?php require('zips.php'); ?>
  </body>
</html>