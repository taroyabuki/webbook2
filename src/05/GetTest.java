import java.net.*;
import java.io.*;
 
public class GetTest {
 
  public static void main(String[] args) {
    try {
      // プロキシサーバの設定
      //System.setProperty("http.proxyHost", "proxy.example.net");
      //System.setProperty("http.proxyPort", "3128");
      //System.setProperty("https.proxyHost", "proxy.example.net");
      //System.setProperty("https.proxyPort", "3128");
 
      // HTTPリクエスト
      URL url = new URL("http://www.unfindable.net/index.html");
      HttpURLConnection connection = (HttpURLConnection) url.openConnection();
 
      // ステータスコード
      System.out.printf("%s %s\n", connection.getResponseCode(),
              connection.getResponseMessage());
 
      // レスポンスボディの表示
      BufferedReader br = new BufferedReader(
              new InputStreamReader(connection.getInputStream(), "UTF-8"));
      String line = null;
      while ((line = br.readLine()) != null) {
        System.out.println(line);
      }
    } catch (Exception e) {
      e.printStackTrace();
    }
  }
}

