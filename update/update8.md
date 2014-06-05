# 8章 データベースを利用するウェブアプリ：補足

## 8.2 データベースの利用

### 8.2.3 PHPからデータベースへのアクセス

パッケージphp5-mysqlが必要です。7.6.1項で紹介するphpMyAdminといっしょにインストールされますが、`sudo apt-get install php5-mysql`としてインストールしてもかまいません。

Macで7.6.1項のphpMyAdminのインストールをやっていない場合、mysql.sockが不整合を起こしている可能性があります。/etc/php.iniにおいて、pdo_mysql.default_socketで指定されたファイルが実際にあることを確認してください。ない場合は次のように修正します（MySQL 5.6 on Mac OS X v10.8 Mountain Lionの場合）。

```
sudo mkdir /var/mysql
sudo ln -s /tmp/mysql.sock /var/mysql/mysql.sock
sudo apachectl restart
```

p. 136の脚註8 PHP 5.3.6以降では、PDOでMySQLに接続する際に文字コードを設定できるようになりました。参考：http://php.net/manual/ja/ref.pdo-mysql.connection.php
