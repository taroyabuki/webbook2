import java.io.*;
import javax.servlet.*;
import javax.servlet.annotation.*;
import javax.servlet.http.*;
 
@WebServlet(name = "SessionTest", urlPatterns = {"/SessionTest"})
public class SessionTest extends HttpServlet {
 
  @Override
  protected void doGet(HttpServletRequest request, HttpServletResponse response)
          throws ServletException, IOException {
    response.setContentType("text/plain; charset=UTF-8");
 
    HttpSession session = request.getSession(); //セッションオブジェクトの生成
    String key = "アクセス回数";
    Integer t = (Integer) session.getAttribute(key); //データの取得
    if (t == null) t = 1; //初めてのアクセス
    else t++; //アクセス回数を更新
    session.setAttribute(key, t); //セッションに保管
    response.getWriter().println(t + "回目のアクセス");
  }
}
