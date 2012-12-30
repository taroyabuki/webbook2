<%@page contentType="text/html" pageEncoding="UTF-8"%>
<%
    //セッションを破棄して転送
    session.invalidate();
    response.sendRedirect("login.jsp");
%>

