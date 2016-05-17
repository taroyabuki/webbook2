<%@page contentType="text/html" pageEncoding="UTF-8"%>
<%@page import="java.util.*"%>
<%@page import="org.apache.commons.lang3.*"%>
<%
    //パラメータをテキストボックスに再現する準備
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
    <title>郵便番号検索フォーム</title>
  </head>
  <body>
    <form action="Controller" method="get">
      <p>
        <input type="text" name="q" value='<%= paramq%>'/>
        <input type="submit" value="search" />
      </p>
    </form>
    <%
        zip.Model model = (zip.Model) request.getAttribute("model");
        if (model != null) {
          out.println("<table>");
          List<String[]> results = model.getResults();
          for (String[] result : results) {
            String code = result[0];
            String address = result[1];
            String office = result[2];
            out.println(String.format("<tr><td>%s</td><td>%s</td><td>%s</td></tr>",
                    code, address, office));
          }
          out.println("</table>");
        }
    %>
  </body>
</html>