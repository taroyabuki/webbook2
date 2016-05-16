# 8章 データベースを利用するウェブアプリ：補足

7章の方法で、データベース`mydb`内にテーブル`message`を作成しておく必要があります。

## 8.1 データベースへのアクセス権

サーバとクライアントを別々にして開発する場合があるので、すべてのクライアント（`%`）からのアクセスを許可しておきましょう。（別々にする場合には、`/etc/mysql/my.cnf`の`bind-address`の値を`0.0.0.0`にしておく必要もあります。）

```sql
GRANT ALL ON mydb.* TO test@'%' IDENTIFIED BY 'pass';
```

## 8.2 データベースの利用

### 8.2.2 Javaからデータベースへのアクセス

「The server time zone value 'JST' is unrecognized or represents more than one time zone. 」というエラーが出るときは、接続URLを次のように修正してください。ここで配布しているファイルは修正済みです。

```java
String url = "jdbc:mysql://localhost/mydb?characterEncoding=UTF-8&serverTimezone=JST";
```

### 8.2.3 PHPからデータベースへのアクセス

* `messageform.php`
* `messageviewer.php`

パッケージphp5-mysqlが必要です。7.6.1項で紹介するphpMyAdminといっしょにインストールされますが、`sudo apt-get install php5-mysql`としてインストールしてもかまいません。

Macで7.6.1項のphpMyAdminのインストールをやっていない場合、mysql.sockが不整合を起こしている可能性があります。/etc/php.iniにおいて、pdo_mysql.default_socketで指定されたファイルが実際にあることを確認してください。ない場合は次のように修正します（MySQL 5.6 on Mac OS X v10.8 Mountain Lionの場合）。

```
sudo mkdir /var/mysql
sudo ln -s /tmp/mysql.sock /var/mysql/mysql.sock
sudo apachectl restart
```

**p. 136** 脚註8 PHP 5.3.6以降では、PDOでMySQLに接続する際に文字コードを設定できるようになりました。ここで配布しているファイルは、それに合わせています。参考：http://php.net/manual/ja/ref.pdo-mysql.connection.php
