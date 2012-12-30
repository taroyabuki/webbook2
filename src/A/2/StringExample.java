import java.util.regex.*;
 
public class StringExample {
 
  public static void main(String[] args) {
    StringBuilder sb = new StringBuilder("文字列の始まり");
    sb.append(" 途中 ");
    sb.append("終わり");
    System.out.println(sb.toString());
    // 出力値：文字列の始まり 途中 終わり
 
    String html = "<h3>文字列</h3><p>文字列を扱うには（中略）</p>"
            + "<H3>正規表現</h3><P>先に説明したStringや\n（後略）</p>";
    Pattern pattern = Pattern.compile("<h3>.*?</h3>");
    Matcher matcher = pattern.matcher(html);
    while (matcher.find()) {
      System.out.println(matcher.group());
    } // 出力値：<h3>文字列</h3>
 
    String[] strs = {"aaXbbXX", "cXXd", "eXXXf"};
    for (String s : strs) {
      System.out.println(s.replaceAll("X+", "Z"));
    }
 
    String[] mails = {
      "yabuki@example.com",
      "taro@example.org",
      "taro.yabuki@unfindable.net"
    };
    for (String s : mails) {
      System.out.println(s.replaceFirst("(.+)@.+\\.(.+)",
              "$1のトップレベルドメインは$2"));
    }
 
    Pattern pattern2 = Pattern.compile("(.+)@.+\\.(.+)");
    for (String s : mails) {
      Matcher matcher2 = pattern2.matcher(s);
      matcher2.find();
      System.out.println(matcher2.group(1) + "のトップレベルドメインは"
              + matcher2.group(2));
    }
  }
}

