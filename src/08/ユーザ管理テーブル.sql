GRANT ALL ON mydb.* TO test@'%' IDENTIFIED BY 'pass';

CREATE TABLE user(
  id int AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(20) NOT NULL,
  password CHAR(40) NOT NULL,
  UNIQUE (username)
);
 
INSERT INTO user (username, password) VALUES ('taro', SHA1('pass'));
 
SELECT * FROM user;