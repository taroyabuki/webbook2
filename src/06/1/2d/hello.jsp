<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>JSP Page</title>
  </head>
  <body>
    <ul><%
      for (int i = 1; i <= 100; ++i) {%>
        <li><%= i%></li><%
      }%>
    </ul>
  </body>
</html>