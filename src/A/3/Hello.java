public class Hello {
 
  public static void main(String[] args) {
    String str1 = null;
    try {
      System.out.println(str1.length());
    } catch (Exception e) {
      System.out.println("例外発生：" + e.getMessage());
    }
    System.out.println("Hello World!");
  }
}

