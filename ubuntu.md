#Ubuntuでの環境構築のまとめ

## 第2章

パッケージを更新する。

```bash
sudo apt-get update
sudo apt-get upgrade
sudo reboot
```

VirtualBox Guest Utilsをインストールする。

```bash
sudo apt-get install virtualbox-ose-guest-utils
sudo reboot
```

ここで、iBusの設定を変更する。Ubuntu 12.04では、キーボードの設定（図2.8）のウィンドウは、Dashホームで「ibus」を検索し、アイコン「キーボード・インプット」をクリックすると出てくる。

Apache HTTP ServerとPHPをインストールする。

```bash
sudo apt-get install apache2 php5 php-pear
```

ドキュメントルートを書き込み可能にする。教科書では「`root:admin`」になっているが、Ubuntu 12.04では初期ユーザがグループadminに属さなくなったため、グループadmを使うことにする。

```bash
sudo chmod 775 /var/www
sudo chown root:adm /var/www
```

ここで`/etc/php5/apache2/php.ini`を編集し、Apacheを再起動する。 (p. 21)

JDKをインストールする。

```bash
sudo apt-get install openjdk-6-jdk
```

NetBeansを利用する場合は、`apt-get`ではなく、[ウェブサイト](ttp://ja.netbeans.org/)からダウンロードできるインストーラを利用する。

## 第3章

[Http Validator](http://users.skynet.be/mgueury/mozilla/)をインストールする。

Firefox以外のブラウザを利用したい場合は、[Chrome](http://www.google.co.jp/intl/ja/chrome/browser/)や[Chromium]、[Opera](http://jp.opera.com/)を導入する。Chromiumなら、`sudo apt-get install chromium-browser`でインストールできる。

## 第4章

[Firebug](https://addons.mozilla.org/ja/firefox/addon/firebug/)をインストールする。

## 第5章

プロキシサーバを利用している環境では、`sudo pear config-set http_proxy proxy.example.net:3128`などとしておく。

PEAR HTTP_Requestをインストールする。

```bash
sudo pear install http_request
```

## 第6章

Commons Landをインストールする。

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
sudo apt-get install lha nkf
```

