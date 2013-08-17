# 8章 データベースを利用するウェブアプリ：補足

## 8.2 データベースの利用

### 8.2.3 PHPからデータベースへのアクセス

パッケージphp5-mysqlが必要です。7.6.1項で紹介するphpMyAdminといっしょにインストールされますが、`sudo apt-get install php5-mysql`としてインストールしてもかまいません。

Macでは、/etc/php.iniのmysqli.default_socketを確認してください。`sudo / -name mysql.sock`などとしてmysql.sock（あるいはmysqld.sock）の場所を確認してから、`sudo vi /etc/php.ini`としてphp.iniに反映し、`sudo apachectl restart`として適用します。以下は例です。viの使い方はいろんなところで紹介されているのでここでは割愛します。

```
pdo_mysql.default_socket=/private/tmp/mysql.sock
```
