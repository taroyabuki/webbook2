# Ubuntuでの環境構築のまとめ

以下は、書籍の通りに進めたい場合のためのメモである。こだわりがないなら、ここに書かれている方法ではなく、[VagrantでWebアプリケーション構築入門](https://github.com/taroyabuki/webbook2server)の方法を推奨する。

## 第2章

パッケージを更新する。

```bash
sudo apt-get update
sudo apt-get -y upgrade
sudo reboot
```

Ubuntu 16.04（2016年5月時点）では、下の方法ではなく、「デバイス→Guest Additions CDイメージの挿入」を実行した方がよさそうである。

VirtualBox Guest Utilsをインストールし、再起動する。

```bash
sudo apt-get -y install virtualbox-guest-utils
sudo reboot
```

キーボードの設定（図2.8）のウィンドウの出し方は以下のとおり。

* Ubuntu 12.04では、Dashホームで「ibus」を検索し、アイコン「キーボード・インプット」をクリックする。
* Ubuntu 14.04と16.04では、Dashホームで「fcitx」を検索し、「Fcitx 設定」をクリックする。

Apache HTTP ServerとPHPをインストールする。**（Ubuntuのバージョンによって変わることに注意）**16.04では`sudo`時の警告を消すための設定もついでにしている。

```bash
#Ubuntu 12.04, 14.04
sudo apt-get -y install apache2 php5

#Ubuntu 16.04
sudo sh -c 'echo 127.0.1.1 $(hostname) >> /etc/hosts'
sudo apt-get -y install apache2 php libapache2-mod-php
```

ドキュメントルート（12.04では`/var/www`，14.04以降では`var/www/html`）を書き込み可能にする。（安易だが，わかりやすくするために，誰でも書き込めるようにする。）

```bash
sudo chmod -R 777 /var/www
```

以下のスクリプトで`/etc/php5/apache2/php.ini`を編集し、Apacheを再起動する。**（Ubuntuのバージョンによって変わることに注意）**（p. 21の作業の代わり）

```bash
#Ubuntu 12.04, 14.04
sudo sed -i -e 's/display_errors = Off/display_errors = On/' /etc/php5/apache2/php.ini

#Ubuntu 16.04
sudo sed -i -e 's/display_errors = Off/display_errors = On/' /etc/php/7.0/apache2/php.ini

#共通
sudo service apache2 restart
```

最新版のGlassFishのために、JDK 7以降をインストールする。**（Ubuntuのバージョンによって変わることに注意）**

```bash
#Ubuntu 12.04
sudo apt-get -y install openjdk-7-jdk

#Ubuntu 14.04, 16.04
sudo apt-get -y install default-jdk
```

以下のいずれかをインストールする。いずれも`apt-get`ではなく、リンク先からダウンロードしてインストールする。

* [NetBeans](https://netbeans.org/downloads/)
* [Java用Eclipse](http://www.eclipse.org/downloads/packages/eclipse-ide-java-ee-developers/mars2)
* [PHP用Eclipse](http://www.eclipse.org/downloads/packages/eclipse-php-developers/mars2)

## 第3章

HTML Validatorはインストールせず、HTMLの文法チェックはNetBeansやEclipseの上で行う。

Firefox以外のブラウザを利用したい場合は、[Chrome](https://www.google.co.jp/chrome/)やChromiumを導入する。Chromiumなら、`sudo apt-get -y install chromium-browser`でインストールできる。

## 第4章

Firebugはインストールせず、`Ctrl+Shift+K`で起動するWebコンソールを使う。

## 第5章

PEAR HTTP_Requestをインストールする。

```bash
sudo apt-get -y install php-http-request
```

## 第6章

Apache Commons Langは書籍で用いたバージョン2系列ではなく，バージョン3系列を使う。`.java`や`.jsp`の「`org.apache.commons.lang.*`」は「`org.apache.commons.lang3.*`」に変更すること。（ここで配布しているファイルは更新済み。）

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

phpMyAdminをインストールする。**（Ubuntuのバージョンによって変わることに注意）**

```bash
MYSQL_ROOT_PASS="pass"
echo "phpmyadmin phpmyadmin/reconfigure-webserver multiselect apache2" | sudo debconf-set-selections
echo "phpmyadmin phpmyadmin/dbconfig-install boolean true" | sudo debconf-set-selections
echo "phpmyadmin phpmyadmin/mysql/admin-pass password $MYSQL_ROOT_PASS" | sudo debconf-set-selections
echo "phpmyadmin phpmyadmin/mysql/app-pass password ''" | sudo debconf-set-selections
sudo apt-get -y install phpmyadmin

#Ubuntu 12.04, 14.04
sudo php5enmod mcrypt

#Ubuntu 16.04
sudo apt-get -y install php-mbstring php-gettext

#共通
sudo service apache2 restart
```

## 第9章

`unzip`と`nkf`をインストールする。

```bash
sudo apt-get -y install unzip nkf
```
