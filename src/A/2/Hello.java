import java.util.*;
import java.text.*;
 
public class Hello {
 
  public static void main(String[] args) {
    //現在の日時を取得
    Calendar cal = Calendar.getInstance();
 
    //日付の表示形式を定義し，実際に表示する
    DateFormat fmt = DateFormat.getDateInstance(DateFormat.FULL);
    System.out.println(fmt.format(cal.getTime()));
 
    fmt = new SimpleDateFormat("yyyy-M-d");
    System.out.println(fmt.format(cal.getTime()));
 
    cal.set(1582, Calendar.OCTOBER, 4);
    cal.add(Calendar.DAY_OF_MONTH, 1);
    System.out.println(fmt.format(cal.getTime())); // 出力値：1582-10-15
  }
}

