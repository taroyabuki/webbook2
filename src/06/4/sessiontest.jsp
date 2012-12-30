<%@page contentType="text/html" pageEncoding="UTF-8"%>
<%
    String key = "アクセス回数";
    Integer t = (Integer) session.getAttribute(key); //データの取得
    if (t == null)  t = 1; //初めてのアクセス
    else t++; //アクセス回数を更新
    session.setAttribute(key, t); //セッションに保管
%>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>セッション</title>
  </head>
  <body>
    <p><%= t%>回目のアクセス</p>
  </body>
</html>

