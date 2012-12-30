package mypackage;
 
import java.util.*;
 
public class PersonTest {
 
  public static void main(String[] args) {
    List<Person> people = new LinkedList<Person>();
    people.add(new Person("Yabuki", "Taro", 1976, 1, 5));
    people.add(new Person("T", "K", 1981, 1, 28));
    people.add(new Person("Y", "M", 1948, 5, 26));
 
    Collections.sort(people, new Comparator<Person>() {
 
      @Override
      public int compare(Person a, Person b) {
        return a.getAge() - b.getAge();
      }
    });
  }
}

