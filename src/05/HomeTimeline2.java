import org.apache.http.client.fluent.*;
import java.util.*;
import javax.script.*;
import jdk.nashorn.internal.runtime.*;

public class HomeTimeline2 {

	public static void main(String[] args) throws Exception {
		String url = "http://localhost/phpweb/home_timeline.json.php";
		String json = Request.Get(url).execute().returnContent().asString();

		ScriptEngineManager sem = new ScriptEngineManager();
		ScriptEngine engine = sem.getEngineByName("JavaScript");
		String script = "Java.asJSONCompatible(" + json + ")";
		((JSONListAdapter) engine.eval(script)).forEach(element -> {
			Map<String, Object> tweet = (Map<String, Object>) element;
//      tweet.forEach((k, v) -> {
//        System.out.println(k + ": " + v);
//      });
			System.out.println(tweet.get("text"));
		});
	}
}