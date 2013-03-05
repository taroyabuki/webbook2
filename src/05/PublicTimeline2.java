import java.net.*;
import org.w3c.dom.*;
import org.xml.sax.*;
import javax.xml.xpath.*;
 
public class PublicTimeline2 {
 
  public static void main(String[] args) {
    try {
      // HTTP通信
      URL url = new URL("http://labs.unfindable.net/public_timeline/xml.php");
      HttpURLConnection connection = (HttpURLConnection) url.openConnection();
 
      // ステータスコード
      System.out.printf("%d %s\n", connection.getResponseCode(),
              connection.getResponseMessage());
 
      // レスポンスボディ
      InputSource inputSource = new InputSource(connection.getInputStream());
 
      XPath xpath = XPathFactory.newInstance().newXPath();
      String expression = "/statuses/status"; // 「//status」でもよい
      NodeList nodes = (NodeList) xpath.evaluate(expression, inputSource,
              XPathConstants.NODESET);
 
      // status要素の中のtext要素と（user要素中の）name要素を取り出す
      for (int i = 0; i < nodes.getLength(); ++i) {
        Node status = nodes.item(i);
        // 返る要素が単数のときはNodeListではなくNode
        Node text = (Node) xpath.evaluate("text", status, XPathConstants.NODE);
        Node name = (Node) xpath.evaluate("user/name", status, XPathConstants.NODE);
        System.out.println(name.getTextContent() + ": " + text.getTextContent());
      }
    } catch (Exception e) {
      e.printStackTrace();
    }
  }
}

