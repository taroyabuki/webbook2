import java.util.*;
 
public class CollectionExample {
 
  public static void main(String[] args) {
    //Java 7で導入されたダイヤモンド演算子
    List<String> members = new ArrayList<>();
    members.add("Taro");
    members.add("K");
    members.add("Alice");
    members.add("Bob");
    System.out.println(Arrays.toString(members.toArray()));
 
    List<String> people = new LinkedList<>();
    people.add("Taro");
    people.add("K");
    people.add("Alice");
    people.add("Bob");
    System.out.println(Arrays.toString(people.toArray()));
 
    for (String name : people) {
      System.out.println(name);
    }
 
    Iterator iterator = people.iterator();
    while (iterator.hasNext()) {
      String name = (String) iterator.next();
      System.out.println(name);
    }
 
    for (int i = 0; i < people.size(); i++) {
      String name = people.get(i);
      System.out.println(name);
    }
    
    //Java 8で導入されたforEachとラムダ記法
    people.forEach((name) -> {
      System.out.println(name);
    });
 
    Set<String> citizens = new HashSet<>();
    citizens.add("Taro");
    citizens.add("K");
    citizens.add("Alice");
    if (citizens.contains("K")) {
      System.out.println("YES");
    }
 
    Map<String, String> dictionary = new HashMap<>();
    dictionary.put("intellect", "知性");
    dictionary.put("conscience", "良心");
    dictionary.put("tradition", "伝統");
    dictionary.put("tradition", "伝説");
    System.out.println(dictionary.get("tradition"));
 
    int[] samples = {5, 3, 2, 4, 1};
    Arrays.sort(samples);
    System.out.println(Arrays.toString(samples)); // 出力値：[1, 2, 3, 4, 5]
 
    List<Integer> list = new LinkedList<>();
    list.add(5);
    list.add(1);
    list.add(10);
    Collections.sort(list);
    System.out.println(Arrays.toString(list.toArray())); // 出力値：[1, 5, 10]
  }
}