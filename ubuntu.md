# Ubuntuでの環境構築のまとめ

以下は、書籍の通りに進めたい場合のためのメモである。特別な理由のない方には、ここに書かれている方法ではなく、「[Dockerを使うウェブアプリケーション開発環境（PHP）](https://github.com/taroyabuki/webdevelop)」の方法を推奨する。



## 第2章

**（バージョン依存）** パッケージを更新する。

```bash
#Ubuntu 12.04
sudo apt-get install python-software-properties
sudo apt-add-repository -y ppa:ptn107/apache #Apache 2.4
sudo add-apt-repository -y ppa:ondrej/php    #PHP 5.5
sudo add-apt-repository -y ppa:openjdk-r/ppa #Java 8
sudo apt-get update

#Ubuntu 14.04
sudo add-apt-repository -y ppa:openjdk-r/ppa #Java 8
sudo apt-get update

#Ubuntu 16.04
sudo apt-get update
```

**（バージョン依存）** VirtualBox Guest Utilsをインストールし、再起動する。Ubuntu 16.04（2016年5月時点）では、この方法ではなく、「デバイス→Guest Additions CDイメージの挿入」を実行した方がよさそうである。

```bash
sudo apt-get -y install virtualbox-guest-utils
sudo reboot
```

キーボードの設定を変更し、`Ctrl+Space`で漢字変換のオンオフを切り替えないようにする。図2.8のウィンドウの出し方は以下のとおり。

* Ubuntu 12.04では、Dashホームで「ibus」を検索し、アイコン「キーボード・インプット」をクリックする。
* Ubuntu 14.04と16.04では、Dashホームで「fcitx」を検索し、「Fcitx 設定」をクリックする。

**（バージョン依存）** Apache HTTP ServerとPHPをインストールする。（16.04では`sudo`時の警告を消すための設定もついでにしている。）

```bash
#Ubuntu 12.04
sudo apt-get -y install apache2.4 php5.5 libapache2-mod-php5.5

#Ubuntu 14.04
sudo apt-get -y install apache2 php5

#Ubuntu 16.04
sudo sh -c 'echo 127.0.1.1 $(hostname) >> /etc/hosts'
sudo apt-get -y install apache2 php libapache2-mod-php
```

ドキュメントルート（12.04では`/var/www`、14.04以降では`var/www/html`）を書き込み可能にする。（安易だが、わかりやすくするために、誰でも書き込めるようにする。）

```bash
sudo chmod -R 777 /var/www
```

**（バージョン依存）** エラーが表示されるように`php.ini`を編集し、Apacheを再起動する。（p. 21の作業の代わり）

```bash
#Ubuntu 12.04
sudo sed -i -e 's/display_errors = Off/display_errors = On/' /etc/php/5.5/apache2/php.ini
sudo service apache2 restart

#Ubuntu 14.04
sudo sed -i -e 's/display_errors = Off/display_errors = On/' /etc/php5/apache2/php.ini
sudo service apache2 restart

#Ubuntu 16.04
sudo sed -i -e 's/display_errors = Off/display_errors = On/' /etc/php/7.0/apache2/php.ini
sudo service apache2 restart
```

JDK 8をインストールする。

```bash
sudo apt-get -y install openjdk-8-jdk
```

[NetBeans](https://netbeans.org/downloads/)の「すべて」をダウンロードし，インストールする。（`apt-get`は使わない。）



## 第3章

HTML Validatorはインストールせず、HTMLの文法チェックはNetBeans上で行う。

Firefox以外のブラウザを利用したい場合は、[Chrome](https://www.google.co.jp/chrome/)やChromiumを導入する。Chromiumなら、`sudo apt-get -y install chromium-browser`でインストールできる。



## 第4章

Firebugはインストールせず、`Ctrl+Shift+K`で起動するWebコンソールを使う。



## 第5章

**（Ubuntu 12.04, 14.04）** PEAR HTTP_Requestをインストールする。（PEAR HTTP_RequestはUbuntu 16.04では使えない。）

```bash
sudo apt-get -y install php-http-request
```

**（バージョン依存）** Twitter APIのためのabraham/twitteroauthに必要なパッケージをインストールする。


```bash
#Ubuntu 12.04
sudo apt-get -y install git php5.5-curl

#Ubuntu 14.04
sudo apt-get -y install git php5-curl

#Ubuntu 16.04
sudo apt-get -y install git php-curl
```



## 第6章

Apache Commons Langは書籍で用いたバージョン2系列ではなく、バージョン3系列を使う。`.java`や`.jsp`の「`org.apache.commons.lang.*`」は「`org.apache.commons.lang3.*`」に変更すること。（ここで配布しているファイルは更新済み。）

```bash
sudo apt-get -y install libcommons-lang3-java
```



## 第7章

MySQLをインストールする。（`root`のパスワードは`pass`）

```bash
MYSQL_ROOT_PASS="pass"
echo "mysql-server mysql-server/root_password password $MYSQL_ROOT_PASS" | sudo debconf-set-selections
echo "mysql-server mysql-server/root_password_again password $MYSQL_ROOT_PASS" | sudo debconf-set-selections
sudo apt-get -y install mysql-server mysql-client
```

**（バージョン依存）** phpMyAdminをインストールする。

```bash
#共通
MYSQL_ROOT_PASS="pass"
echo "phpmyadmin phpmyadmin/reconfigure-webserver multiselect apache2" | sudo debconf-set-selections
echo "phpmyadmin phpmyadmin/dbconfig-install boolean true" | sudo debconf-set-selections
echo "phpmyadmin phpmyadmin/mysql/admin-pass password $MYSQL_ROOT_PASS" | sudo debconf-set-selections
echo "phpmyadmin phpmyadmin/mysql/app-pass password ''" | sudo debconf-set-selections

#Ubuntu 12.04
sudo apt-get -y install phpmyadmin php5.5-mysql
sudo php5enmod mcrypt
sudo a2enmod authn_core
sudo sh -c "echo 'Include /etc/phpmyadmin/apache.conf' >> /etc/apache2/apache2.conf"
sudo service apache2 restart

#Ubuntu 14.04
sudo apt-get -y install phpmyadmin
sudo php5enmod mcrypt
sudo service apache2 restart

#Ubuntu 16.04
sudo apt-get -y install phpmyadmin php-mbstring php-gettext
sudo service apache2 restart
```



## 第9章

`unzip`と`nkf`をインストールする。

```bash
sudo apt-get -y install unzip nkf
```
