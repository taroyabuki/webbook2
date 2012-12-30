<%@page contentType="text/html" pageEncoding="UTF-8"%>
<%@page import="org.apache.commons.lang.*"%>
<%@page import="java.sql.*"%>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>メッセージ一覧</title>
  </head>
  <body>
    <dl>
      <%
          //データベースに接続
          Class.forName("com.mysql.jdbc.Driver").newInstance();
          String url = "jdbc:mysql://localhost/mydb?characterEncoding=UTF-8";
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
            name = StringEscapeUtils.escapeXml(name);
            body = StringEscapeUtils.escapeXml(body);
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

