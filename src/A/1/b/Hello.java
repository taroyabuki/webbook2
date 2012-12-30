import java.util.*;
 
public class Hello {
 
  public static void main(String[] args) {
    int[] a = {1, 2, 3};
    System.out.println(a.length); //出力値：3
    System.out.println(Arrays.toString(a)); //出力値：[1, 2, 3]
 
    String str = "Hello World!";
    System.out.println(str.length()); //出力値：12
    System.out.println(str.toUpperCase()); //出力値：HELLO WORLD!
  }
}
