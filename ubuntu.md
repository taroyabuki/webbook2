#Ubuntuでの環境構築のまとめ

## 第2章

パッケージを更新する。

```bash
sudo apt-get update
sudo apt-get upgrade
sudo reboot
```

VirtualBox Guest Utilsをインストールする。（[動画](http://youtu.be/ey_V6nDIHME)）

```bash
sudo apt-get install virtualbox-guest-utils
sudo reboot
```

キーボードの設定を変更する。

* Ubuntu 12.04では、キーボードの設定（図2.8）のウィンドウは、Dashホームで「ibus」を検索し、アイコン「キーボード・インプット」をクリックすると出てくる（[動画](http://youtu.be/nZZJxYX-FHk)）。* Ubuntu 14.04では、Dashホームで「fcitx」を検索し、「Fcitx 設定」をクリックすると出てくる。Ctrl+SpaceはNetBeansで使うため、他のキーを割り当てる。

Apache HTTP ServerとPHPをインストールする。（[動画](http://youtu.be/LBU6ihgCEuk)）

```bash
sudo apt-get install apache2 php5 php-pear
```

ドキュメントルートを書き込み可能にする。

* 書籍では「`root:admin`」になっているが、Ubuntu 12.04では初期ユーザがグループadminに属さなくなったため、グループadmを使うことにする。
* Ubuntu 14.04では、Apacheのドキュメントルートは`/var/www/html`になっている。これを`/var/www`に戻すために、`sudo gedit /etc/apache2/sites-enabled/000-default.conf`として設定ファイルを開き、`DocumentRoot /var/www/html`を`DocumentRoot /var/www`に変更してから先に進む。

```bash
sudo chmod 775 /var/www
sudo chown root:adm /var/www
```

ここで`/etc/php5/apache2/php.ini`を編集し、Apacheを再起動する。 (p. 21)

JDKをインストールする。（最新版のGlassFishのために、JDK 7をインストールします。）

```bash
sudo apt-get install openjdk-7-jdk
```

以下のいずれかをインストールする。いずれもapt-getではなく、リンク先からダウンロードしてインストールする。

* [NetBeans](https://netbeans.org/downloads/)
* [Java用Eclipse](http://dlc.sun.com.edgesuite.net/glassfish/eclipse/)
* [PHP用Eclipse](http://www.zend.com/en/company/community/pdt/downloads)

## 第3章

[HTML Validator](http://users.skynet.be/mgueury/mozilla/)をインストールする。

Firefox以外のブラウザを利用したい場合は、[Chrome](http://www.google.co.jp/intl/ja/chrome/browser/)や[Chromium](http://www.chromium.org/Home)、[Opera](http://jp.opera.com/)を導入する。Chromiumなら、`sudo apt-get install chromium-browser`でインストールできる。

## 第4章

[Firebug](https://addons.mozilla.org/ja/firefox/addon/firebug/)をインストールする。（Ubuntu 14.04のFirefoxには、`Ctrl+Shift+K`で起動するWebコンソールがあるため、Firebugをインストールしなくてもかまいません。）

## 第5章

プロキシサーバを利用している環境では、`sudo pear config-set http_proxy proxy.example.net:3128`などとしておく。

PEAR HTTP_Requestをインストールする。

```bash
sudo pear install http_request
```

## 第6章

Commons Langをインストールする。

```bash
sudo apt-get install libcommons-lang-java
```

## 第7章

MySQLとphpMyAdminをインストールする。

```bash
sudo apt-get install mysql-server mysql-client
sudo apt-get install phpmyadmin
```

## 第9章

Lhaとnkfをインストールする。

```bash
sudo apt-get install lha-sjis nkf
```
