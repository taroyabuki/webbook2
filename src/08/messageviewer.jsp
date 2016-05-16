<%@page contentType="text/html" pageEncoding="UTF-8"%>
<%@page import="org.apache.commons.lang3.*"%>
<%@page import="java.sql.*"%>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>メッセージ一覧</title>
  </head>
  <body>
    <dl>
      <%
          //データベースに接続
          Class.forName("com.mysql.jdbc.Driver").newInstance();
          String url = "jdbc:mysql://localhost/mydb?characterEncoding=UTF-8&serverTimezone=JST";
          Connection conn = DriverManager.getConnection(url, "test", "pass");
 
          //データベースのデータを取得
          PreparedStatement stmt = conn.prepareStatement(
                  "SELECT name,body FROM message ORDER BY id DESC");
          ResultSet rs = stmt.executeQuery();
 
          //結果を1件ずつ表示する
          while (rs.next()) {
            //結果を取り出す
            String name = rs.getString("name");
            String body = rs.getString("body");
 
            //サニタイズ
            name = StringEscapeUtils.escapeXml10(name);
            body = StringEscapeUtils.escapeXml10(body);
            out.println("<dt>" + name + "</dt>");
            out.println("<dd>" + body.replaceAll("\\n", "<br />") + "</dd>");
          }
 
          //データベースから切断
          rs.close();
          stmt.close();
          conn.close();
      %>
    </dl>
  </body>
</html>