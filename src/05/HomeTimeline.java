import java.net.*;
import java.io.*;
import java.util.*;
import javax.script.*;
import jdk.nashorn.internal.runtime.*;

public class HomeTimeline {

  public static void main(String[] args) throws Exception {
    URL url = new URL("http://localhost/phpweb/home_timeline.json.php");
    HttpURLConnection connection = (HttpURLConnection) url.openConnection();
    BufferedReader br = new BufferedReader(
            new InputStreamReader(connection.getInputStream(), "UTF-8"));
    StringBuilder json = new StringBuilder();
    String line;
    while ((line = br.readLine()) != null) {
      json.append(line);
    }

    ScriptEngineManager sem = new ScriptEngineManager();
    ScriptEngine engine = sem.getEngineByName("JavaScript");
    String script = "Java.asJSONCompatible(" + json + ")";
    for (Object element : (JSONListAdapter) engine.eval(script)) {
      Map<String, Object> tweet = (Map<String, Object>) element;
//      for (Map.Entry<String, Object> entry: tweet.entrySet()) {
//        System.out.println(entry.getKey() + ": " + entry.getValue());
//      }
      System.out.println(tweet.get("text"));
    }
  }
}