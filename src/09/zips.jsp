<%@page contentType="text/html" pageEncoding="UTF-8"%>
<%@page import="java.sql.*"%>
<%@page import="org.apache.commons.lang3.*"%>
<%
  //検索キーワードを取得
  String q = request.getParameter("q");
  if (q != null) { //注：書籍版とは違っています（空のtable要素を出力させない）
     
    //データベースに接続
    Class.forName("com.mysql.jdbc.Driver").newInstance();
    String url = "jdbc:mysql://localhost/mydb?characterEncoding=UTF-8&serverTimezone=JST";
    Connection conn = DriverManager.getConnection(url, "test", "pass");
 
    //検索
    PreparedStatement stmt = conn.prepareStatement(
            "SELECT * FROM zip WHERE code LIKE ? ORDER BY code");
    stmt.setString(1, q + "%");
    stmt.setMaxRows(20); // 結果の数を制限する
    ResultSet rs = stmt.executeQuery();
 
    out.println("<table>");
 
    //結果を1件ずつ処理
    while (rs.next()) {
      String code = rs.getString("code");
      String address = rs.getString("address1")
              + rs.getString("address2")
              + rs.getString("address3")
              + rs.getString("address4");
      String office = rs.getString("office");
 
      out.println("<tr>"
              + "<td>" + StringEscapeUtils.escapeHtml4(code) + "</td>"
              + "<td class='address'>" + StringEscapeUtils.escapeHtml4(address) + "</td>"
              + "<td>" + StringEscapeUtils.escapeHtml4(office) + "</td>"
              + "</tr>");
    }
    out.println("</table>");
 
    //接続を閉じる
    rs.close();
    stmt.close();
    conn.close();
  }
%>