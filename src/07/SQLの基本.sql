-- 7.3 データベースとテーブルの作成
 
CREATE DATABASE mydb DEFAULT CHARACTER SET utf8;
 
USE mydb
 
-- DROP DATABASE mydb;
 
CREATE TABLE message (
  id INT AUTO_INCREMENT PRIMARY KEY,     -- 整数カラムid（主キー）
  name VARCHAR(10) DEFAULT 'k' NOT NULL, -- 文字列カラムname（10文字まで）．デフォルトは'k'
  body VARCHAR(17) NOT NULL              -- 文字列カラムbody（17文字まで）
) DEFAULT CHARSET=utf8;                  -- 文字コードはUTF-8
 
SHOW TABLES;
 
DESC message;
 
 
-- 7.4 MySQLの文字コード
 
SHOW VARIABLES LIKE '%char%';
 
 
-- 7.5 データの操作
--- 7.5.1 データの生成
 
INSERT INTO message VALUES (1,'taro','test');
 
INSERT INTO message VALUES (2,'k','テスト'),(3,'taro','feeling'' groovy');
 
INSERT INTO message (body) VALUES ('\\(^^)/');
 
 
-- 7.5.2 データの検索
 
SELECT * FROM message WHERE id=2;
 
SELECT * FROM message WHERE body='test';
 
SELECT * FROM message WHERE name LIKE 'T%';
 
SELECT * FROM message WHERE name LIKE 'T%'\G
 
SELECT * FROM message WHERE id=2 OR id=3;
 
SELECT body FROM message WHERE id=2 OR id=3;
 
SELECT id*10 AS num FROM message;
 
SELECT * FROM message WHERE MOD(id,2)=1;
 
SELECT SUBSTR('ABCDEF',3,2);
 
 
-- 7.5.3 データの更新
 
UPDATE message SET body='ABC' WHERE id=1;
 
UPDATE message SET body=CONCAT(body, 'DEF') WHERE id=1;

