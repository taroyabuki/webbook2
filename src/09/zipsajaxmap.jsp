<%@page contentType="text/html" pageEncoding="UTF-8"%>
<%@page import="org.apache.commons.lang3.*"%>
<%
  //テキストボックスに検索キーワードを再現する準備
  String paramq = request.getParameter("q");
  if (paramq != null) {
    paramq = StringEscapeUtils.escapeHtml4(paramq);
  } else {
    paramq = "";
  }
%>
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
        $("#q").keyup(function() {
          var url = "zips.jsp?q=" + $("#q").val();
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
        <input id="q" type="text" name="q" value='<%= paramq%>'/>
        <input type="submit" value="search" />
      </p>
    </form>
    <div id="map_canvas" style="float:right; width:50%; height:90%;"></div>
    <div id="result"><jsp:include page="zips.jsp" /></div>
  </body>
</html>