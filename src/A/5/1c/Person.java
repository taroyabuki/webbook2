package mypackage;

import java.util.*;

public class Person {

  private String firstName;
  private String lastName;
  private Calendar birthday = Calendar.getInstance();

  public Person() {}

  public Person(String firstName, String lastName) {
    this.firstName = firstName;
    this.lastName = lastName;
  }

  public Person(String firstName, String lastName, int year, int month, int date) {
    this.firstName = firstName;
    this.lastName = lastName;
    this.setBirthday(year, month, date);
  }

  //このメソッドはfinalとしてオーバーライドできないようにする
  public final void setBirthday(int year, int month, int date) {
    birthday.set(year, month - 1, date, 0, 0, 0); //1月が0だから
  }

  public Calendar getBirthday() {
    return birthday;
  }

  public int getYear() {
    return birthday.get(Calendar.YEAR);
  }

  public int getMonth() {
    return birthday.get(Calendar.MONTH) + 1;
  }

  public int getDate() {
    return birthday.get(Calendar.DAY_OF_MONTH);
  }

  public int getAge() {
    Calendar today = Calendar.getInstance();
    int year = today.get(Calendar.YEAR);
    int month = today.get(Calendar.MONTH);
    int date = today.get(Calendar.DAY_OF_MONTH);

    if (getMonth() < month) {
      return year - getYear();
    }
    if (getMonth() > month) {
      return year - getYear() - 1;
    }
    if (getDate() <= date) {
      return year - getYear();
    }
    return year - getYear() - 1;
  }

  public void run() throws Exception {
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