import java.net.*;
import org.w3c.dom.*;
import org.xml.sax.*;
import javax.xml.xpath.*;
 
public class PublicTimeline {
 
  public static void main(String[] args) {
    try {
      // HTTP通信
      URL url = new URL("http://api.twitter.com/1/statuses/public_timeline.xml");
      HttpURLConnection connection = (HttpURLConnection) url.openConnection();
 
      // ステータスコード
      System.out.printf("%d %s\n", connection.getResponseCode(),
              connection.getResponseMessage());
 
      // レスポンスボディ
      InputSource inputSource = new InputSource(connection.getInputStream());
 
      // XPATHを使ってXMLを処理する
      XPath xpath = XPathFactory.newInstance().newXPath();
      String expression = "//text"; // すべてのtext要素
       
      // 複数のノードが返るときはNodeListを使う
      NodeList nodes = (NodeList) xpath.evaluate(expression, inputSource,
              XPathConstants.NODESET);
 
      for (int i = 0; i < nodes.getLength(); ++i) {
        Node textNode = nodes.item(i);
        System.out.println(textNode.getTextContent());
      }
    } catch (Exception e) {
      e.printStackTrace();
    }
  }
}

