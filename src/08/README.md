# 8章 データベースを利用するウェブアプリ：補足

7章の方法で、データベース`mydb`内にテーブル`message`を作成しておく必要があります。

## 8.1 データベースへのアクセス権

データベースのサーバとクライアントを別々にして開発する場合があるので、すべてのクライアント（`%`）からのアクセスを許可しておきます。別々にする場合には、`/etc/mysql/my.cnf`（Ubuntu 12.04と14.04）や`/etc/mysql/mysql.conf.d/mysqld.cnf`（Ubuntu 16.04）において、`bind-address`の値を`0.0.0.0`にしておく必要もありますが、その作業はここでは割愛します。

```sql
GRANT ALL ON mydb.* TO test@'%' IDENTIFIED BY 'pass';
```

## 8.2 データベースの利用

### 8.2.2 Javaからデータベースへのアクセス

「The server time zone value 'JST' is unrecognized or represents more than one time zone. 」というエラーが出るときは、接続URLを次のように修正してください。（ここで配布しているファイルは修正済みです。）

```java
String url = "jdbc:mysql://localhost/mydb?characterEncoding=UTF-8&serverTimezone=JST";
```

**p. 136 脚註5** Java 7で導入されたtry-with-resourcesを使うと、`try(...)`の中で確保したリソースの解法を省略できます。例として、[9.6.2項のModel.java](https://github.com/taroyabuki/webbook2/blob/master/src/09/Model.java)をtry-with-resourcesを使って書き直しました。

### 8.2.3 PHPからデータベースへのアクセス

PHPからMySQLに接続するためのライブラリが必要なので、7.6.1項のphpMyAdminのインストールを先に済ませてください。

* `messageform.php`
* `messageviewer.php`

**p. 136 脚註8** PHP 5.3.6以降では、PDOでMySQLに接続する際に文字コードを設定できるようになりました。ここで配布しているファイルは、それに合わせています。参考：http://php.net/manual/ja/ref.pdo-mysql.connection.php
