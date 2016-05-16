<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>JSP Page</title>
  </head>
  <body>
    <%
        for (int i = 1; i <= 100; ++i) {
          out.print(i + ",");
        }
    %>
  </body>
</html>