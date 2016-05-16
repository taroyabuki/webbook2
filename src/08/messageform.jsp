<%@page contentType="text/html" pageEncoding="UTF-8"%>
<%@page import="java.sql.*"%>
<%
    //送信データの取得
    request.setCharacterEncoding("UTF-8");
    String username = request.getParameter("username");
    String message = request.getParameter("message");
 
    //送信データがあるなら
    if (message != null) {
      //データベースへの接続
      Class.forName("com.mysql.jdbc.Driver").newInstance();
      String url = "jdbc:mysql://localhost/mydb?characterEncoding=UTF-8&serverTimezone=JST";
      Connection conn = DriverManager.getConnection(url, "test", "pass");
 
      //SQL文の作成
      PreparedStatement pstmt = conn.prepareStatement(
              "INSERT INTO message (name,body) VALUES (?,?)");
      pstmt.setString(1, username);
      pstmt.setString(2, message);
 
      //SQL文の実行
      pstmt.executeUpdate();
 
      //データベースからの切断
      pstmt.close();
      conn.close();
    }
%>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>メッセージ登録フォーム</title>
  </head>
  <body>
    <h1>メッセージ登録フォーム</h1>
    <form action="" method="post">
      <dl>
        <dt>名前</dt><dd><input type="text" name="username" /></dd>
        <dt>メッセージ</dt><dd><textarea name="message" rows="3" cols="30"></textarea></dd>
      </dl>
      <p><input type="submit" value="送信" /></p>
    </form>
  </body>
</html>