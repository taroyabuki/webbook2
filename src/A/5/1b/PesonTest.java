package mypackage;
 
public class PersonTest {
 
  public static void main(String[] args) {
    Person taro = new Person();
    taro.setFirstName("Taro");
    try {
      taro.run();
    } catch (Exception ex) {
      ex.printStackTrace();
    }
  }
}

