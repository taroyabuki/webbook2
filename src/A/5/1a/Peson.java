package mypackage;
 
public class Person {
 
  private String firstName;
  private String lastName;
 
  public void run() {
    System.out.printf("Run! %s!\n", firstName);
  }
 
  public String getFirstName() {
    return firstName;
  }
 
  public void setFirstName(String firstName) {
    this.firstName = firstName;
  }
 
  public String getLastName() {
    return lastName;
  }
 
  public void setLastName(String lastName) {
    this.lastName = lastName;
  }
}

