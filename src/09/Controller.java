package zip;
 
import java.io.*;
import javax.servlet.*;
import javax.servlet.annotation.*;
import javax.servlet.http.*;
 
@WebServlet(name = "Controller", urlPatterns = {"/Controller"})
public class Controller extends HttpServlet {
 
  @Override
  protected void doGet(HttpServletRequest request, HttpServletResponse response)
          throws ServletException, IOException {
    String q = request.getParameter("q");
    if (q != null) {                        //リクエストパラメータがあったら
      Model model = new Model();            //モデルを生成し，
      model.setQ(q);                        //パラメータを設定
      model.execute();                      //検索を実行
      request.setAttribute("model", model); //結果をリクエストスコープに保管し，
    }                                       //制御をビューに渡す
    getServletContext().getRequestDispatcher("/view.jsp").forward(request, response);
  }
}
