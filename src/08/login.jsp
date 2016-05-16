<%@page contentType="text/html" pageEncoding="UTF-8"%>
<%@page import="java.sql.*"%>
<%
    String username = request.getParameter("username");
    String password = request.getParameter("password");
 
    //データベースに接続して検索
    if (username != null && password != null) {
      Class.forName("com.mysql.jdbc.Driver").newInstance();
      String url = "jdbc:mysql://localhost/mydb?characterEncoding=UTF-8&serverTimezone=JST";
      Connection conn = DriverManager.getConnection(url, "test", "pass");
      PreparedStatement pstmt = conn.prepareStatement(
              "SELECT * FROM user WHERE username=? AND password=SHA1(?)");
      pstmt.setString(1, username);
      pstmt.setString(2, password);
      ResultSet rs = pstmt.executeQuery();
 
      //ログイン成功なら
      if (rs.next()) {
        //セッションを再生成，セッションにユーザ名を登録して転送
        session.invalidate();
        session = request.getSession();
        session.setAttribute("username", username);
        response.sendRedirect("secretform.jsp");
      }
      pstmt.close();
      conn.close();
    }
%>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>ログイン</title>
  </head>
  <body>
    <h1>ログイン</h1>
    <form action="" method="post">
      <dl>
        <dt>ユーザ名</dt><dd><input type="text" name="username" /></dd>
        <dt>パスワード</dt><dd><input type="password" name="password" /></dd>
      </dl>
      <p><input type="submit" value="ログイン" /></p>
    </form>
  </body>
</html>