import java.io.*;
import javax.servlet.*;
import javax.servlet.http.*;
import javax.servlet.annotation.*;
import org.apache.commons.lang.*;
 
@WebServlet(name = "Parameters", urlPatterns = {"/Parameters"})
public class Parameters extends HttpServlet {
 
  @Override
  protected void doGet(HttpServletRequest request, HttpServletResponse response)
          throws ServletException, IOException {
    request.setCharacterEncoding("UTF-8");
    String firstName = request.getParameter("firstname");
    String lastName = request.getParameter("lastname");
 
    PrintWriter out = response.getWriter();
    out.println("<html><body><dl>");
    out.println("<dt>First Name</dt>");
    out.println("<dd>" + StringEscapeUtils.escapeXml(firstName) + "</dd>");
    out.println("<dt>Last Name</dt>");
    out.println("<dd>" + StringEscapeUtils.escapeXml(lastName) + "</dd>");
    out.println("</dl></body></html>");
  }
}

