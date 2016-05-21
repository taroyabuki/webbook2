package mypackage;

import java.util.*;

public class PersonTest {

  public static void main(String[] args) {
    List<Person> people = new LinkedList<>();
    people.add(new Person("Yabuki", "Taro", 1976, 1, 5));
    people.add(new Person("T", "K", 1981, 1, 28));
    people.add(new Person("Y", "M", 1948, 5, 26));

    //Java 8で導入されたラムダ記法
    Collections.sort(people, (Person a, Person b) -> a.getAge() - b.getAge());

    people.forEach(person -> {
      System.out.println(person.getLastName() + " " + person.getFirstName());
    });
  }
}