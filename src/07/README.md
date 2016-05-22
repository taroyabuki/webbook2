# 7章 データベースの操作：補足

## 7.2 MySQL

### 7.2.1 MySQLのインストール

**p. 94** Ubuntuで次のようにインストールするのが簡単です。`root`のパスワードは`pass`になります。

```bash
sudo apt-get update
MYSQL_ROOT_PASS="pass"
echo "mysql-server mysql-server/root_password password $MYSQL_ROOT_PASS" | sudo debconf-set-selections
echo "mysql-server mysql-server/root_password_again password $MYSQL_ROOT_PASS" | sudo debconf-set-selections
sudo apt-get -y install mysql-server
```

## 7.6 phpMyAdmin

### 7.6.1 phpMyAdminのインストール

**p. 106** Ubuntuで次のようにインストールするのが簡単です。（MySQLの`root`のパスワードは`pass`と仮定しています。）

```bash
sudo apt-get update
MYSQL_ROOT_PASS="pass"
echo "phpmyadmin phpmyadmin/reconfigure-webserver multiselect apache2" | sudo debconf-set-selections
echo "phpmyadmin phpmyadmin/dbconfig-install boolean true" | sudo debconf-set-selections
echo "phpmyadmin phpmyadmin/mysql/admin-pass password $MYSQL_ROOT_PASS" | sudo debconf-set-selections
echo "phpmyadmin phpmyadmin/mysql/app-pass password ''" | sudo debconf-set-selections
sudo apt-get -y install phpmyadmin
```

[http://localhost/phpmyadmin/](http://localhost/phpmyadmin/)で動作を確認します。（ユーザ名：`root`、パスワード：`pass`）

### コラム：パフォーマンスチューニング

**p. 113** あらかじめ用意されている設定ファイルを使う際の注意：[MySQLのテンプレ設定ファイルの使い方](http://blog.unfindable.net/archives/2663)
