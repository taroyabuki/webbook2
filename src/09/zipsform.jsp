<%@page contentType="text/html" pageEncoding="UTF-8"%>
<%@page import="org.apache.commons.lang3.*"%>
<%
    //テキストボックスに検索キーワードを再現する準備
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
    <form action="" method="get">
      <p>
        <input type="text" name="q" value='<%= paramq%>'/>
        <input type="submit" value="search" />
      </p>
    </form>
    <jsp:include page="zips.jsp" />
  </body>
</html>