package mypackage;
 
public class Labor extends Person {
 
  int salary;
 
  @Override
  public void run() {
    System.out.printf("Run! %s! Run!\n", getFirstName());
  }
}

