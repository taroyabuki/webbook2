<%@page contentType="text/html" pageEncoding="UTF-8"%>
<%@page import="java.sql.*"%>
<%
    //セッションからusernameを取り出す．無かったらログイン画面へ転送
    String username = (String) session.getAttribute("username");
    if (username == null) {
      response.sendRedirect("login.jsp");
    }
    //送信データがあるなら，データベースに登録
    request.setCharacterEncoding("UTF-8");
    String message = request.getParameter("message");
    if (message != null) {
      Class.forName("com.mysql.jdbc.Driver").newInstance();
      String url = "jdbc:mysql://localhost/mydb?characterEncoding=UTF-8";
      Connection conn = DriverManager.getConnection(url, "test", "pass");
 
      PreparedStatement pstmt = conn.prepareStatement(
              "INSERT INTO message (name,body) VALUES (?,?)");
      pstmt.setString(1, username);
      pstmt.setString(2, message);
      pstmt.executeUpdate();
      pstmt.close();
      conn.close();
    }
%>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>メッセージ登録フォーム</title>
  </head>
  <body>
    <h1>メッセージ登録フォーム</h1>
    <p><%= username%>としてログインしています．<a href="logout.jsp">ログアウト</a></p>
    <form action="" method="post">
      <p>
        <textarea name="message" rows="3" cols="30"></textarea>
        <input type="submit" value="送信" />
      </p>
    </form>
  </body>
</html>

