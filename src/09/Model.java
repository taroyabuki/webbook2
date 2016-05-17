package zip;
 
import java.util.*;
import java.sql.*;
 
public class Model {
 
  private String q;
  private List<String[]> results;
 
  public List<String[]> getResults() {
    return results;
  }
 
  public void setQ(String q) {
    this.q = q;
  }
 
  public void execute() {
    try {
      Class.forName("com.mysql.jdbc.Driver").newInstance();
      String url = "jdbc:mysql://localhost/mydb?characterEncoding=UTF-8&serverTimezone=JST";
      Connection conn = DriverManager.getConnection(url, "test", "pass");
 
      PreparedStatement stmt = conn.prepareStatement("SELECT * FROM zip WHERE code LIKE ? ORDER BY code");
      stmt.setString(1, q + "%");
      stmt.setMaxRows(20);
      ResultSet rs = stmt.executeQuery();
 
      results = new LinkedList<String[]>();
      while (rs.next()) {
        String result[] = {rs.getString("code"),
          rs.getString("address1")
          + rs.getString("address2")
          + rs.getString("address3")
          + rs.getString("address4"),
          rs.getString("office")};
        results.add(result);
      }
      rs.close();
      stmt.close();
      conn.close();
    } catch (Exception ex) {
      ex.printStackTrace();
    }
  }
}