<?php
//パラメータをテキストボックスに再現する準備
$paramq = '';
if (isset($_GET['q']))
  $paramq = htmlspecialchars($_GET['q']);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <style type="text/css">
      html, body { height: 100%; }
      td { font-size: smaller; }
    </style>
    <script type="text/javascript"
            src="http://maps.google.com/maps/api/js?sensor=false"></script>
    <script type="text/javascript" src="http://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load("jquery", "1.5.0");
    </script>
    <script type="text/javascript" src="addressmaps.js"></script>
    <script type="text/javascript">
      $(document).ready(function() {
        $("#q").keyup(function() {
          console.log("here");
          var url = "zips.php?q=" + $("#q").val();
          $("#result").load(url, function() {
            var address = $(".address:first").text();
            drawMap(address); // 地図を生成する
          });
        });
        var address = $(".address:first").text();
        drawMap(address); // 地図を生成する
      });
    </script>
    <title>リアルタイム郵便番号検索</title>
  </head>
  <body>
    <form action="" method="get">
      <p>
        <input id="q" type="text" name="q" value='<?php echo $paramq; ?>'/>
        <input type="submit" value="search" />
      </p>
    </form>
    <div id="map_canvas" style="float: right; width: 50%; height: 90%;"></div>
    <div id="result"><?php require('zips.php'); ?></div>
  </body>
</html>

