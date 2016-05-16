# 2章 開発環境の構築：補足

## 2.2 仮想マシンの構築

### 2.2.1 仮想マシンの新規作成

**p. 16**

* [**動画**：VirtualBox 4.2.16のインストール（Windows 7）](http://youtu.be/6mVr4APoPN8)
* [**動画**：VirtualBox 4.2.16のインストール（Mac OS X v10.8 Mountain Lion）](http://youtu.be/1o0h83ZNlyQ)
* [**動画**：仮想マシンの新規作成（VirtualBox 4.2.16）](http://youtu.be/HMGZSxsU_CQ)

新しいバージョンのVirtualBoxでは、仮想マシンの作成手続きが、本書に掲載したものとは違っています。基本的には、デフォルトのまま作成手続きを進めてかまいません。

**p. 18** [**動画**：Ubuntu 12.04のインストール](http://youtu.be/9Bb2l05pHSA)

### 2.2.2 Guest Additionsのインストール

**p. 19** Guest Additionsをインストールする前に、以下のコマンドでパッケージを更新しておきましょう。

```bash
sudo apt-get update
sudo apt-get upgrade
sudo reboot
```

**p. 19** [**動画**：Guest Additionsのインストール（Ubuntu 12.04）](http://youtu.be/HXP9FJK6apk)

**p. 19** [**動画**：パッケージ`virtualbox-ose-guest-utils`のインストール](http://youtu.be/ey_V6nDIHME)

Guest Additionsはパッケージ`virtualbox-ose-guest-utils`で代用できます。この方が、書籍の方法より簡単です。

### 2.2.3 キーボードの設定

**p. 19** [**動画**：キーボードの設定（Ubuntu 12.04）](http://youtu.be/nZZJxYX-FHk)

Dashメニューの検索窓に「ibus」と入力すると、「Keyboard Input Methods」あるいは「キーボード・インプットメソッド」という項目が現れるのでそれをクリックしてください。図2.8のようなウィンドウが現れます。

### 2.2.4 プロキシサーバの設定

**p. 20** サーバ情報を入力したら、「システム全体に適用」をクリックしてください。

**p. 20** Ubuntu 12.04では、右上の電源アイコンをクリック→「システム設定」→「ネットワーク」→「ネットワークプロキシ」→メソッドを「手動」にすると、図2.9のようなウィンドウが現れます。左上のアイコンをクリックして「network」と入力してもいいでしょう。

## Apache HTTP ServerとPHP

### 2.3.1 Ubuntu

**p. 20** [**動画**：ApacheとPHPのインストール（Ubuntu 12.04）](http://youtu.be/LBU6ihgCEuk)

**p. 20** 「端末」は「`Ctrl + Alt + T`」で起動します。

**p. 21** Ubuntu 14.04では、Apacheのドキュメントルートは`/var/www/html`になっています。本書の内容やNetBeansの動作に合わせるために、`sudo gedit /etc/apache2/sites-enabled/000-default.conf`として設定ファイルを開き、`DocumentRoot /var/www/html`を`DocumentRoot /var/www`に変更してから`sudo service apache2 restart`としてApacheを再起動してください。

**p. 21** ディレクトリ/var/wwwを書き込み可能にするためのコマンドは、本文の代わりに以下のものを使ってください（Ubuntu 12.04への対応ですが、10.04でも有効です）。

```bash
sudo chmod 775 /var/www
sudo chown root:adm /var/www
```

### 2.3.2 Windows

**p. 21** [**動画**：XAMPP 1.8.3のインストール（Windows 7）](http://youtu.be/cBDShvp70iI)

**p. 21** XAMPPはhttp://www.apachefriends.org/jp/xampp-windows.html で公開されています。

**p. 22** ApacheとMySQLをサービスとしてインストールする際には、XAMPP Control Panelを管理者として実行してください（上記動画を参照）。

### 2.3.3 Mac

**p. 22** [**動画**：ApacheとPHPの設定（Mac OS X v10.8 Mountain Lion）](http://youtu.be/k9eAmhgbILc)

**p. 22** [sudo コマンドには非ブランク管理パスワードが必要](http://support.apple.com/kb/HT4103?viewlocale=ja_JP)です。

**p. 22** Ubuntuの場合(p. 21)と同様、以下のようにしてドキュメントルートを書き込み可能にしておきます。

```bash
sudo chmod 775 /Library/WebServer/Documents
sudo chown root:admin /Library/WebServer/Documents
```

エラーメッセージを表示させる必要が無い場合も、php.iniは作成してください（そうしないと、magic_quotes_gpcがOffになりません）。

## 2.4 GlassFishhと統合開発環境

2.4.2 NetBeansと2.4.3 Eclipseは、どちらか一方だけでかまいません。

### 2.4.1 Java Development Kit

**p. 23** Java 7のパッケージが利用可能になったので、Java 6ではなくJava 7を使ってください（NetBeans 7.3のためには、Java 7が必要です）。

```bash
sudo apt-get install openjdk-7-jdk
```

#### Windows

**p. 23** [**動画**：JDK 1.7.0のインストール（Windows 7）](http://youtu.be/QoNMqVRPQW0)

WindowsでJava 7を使う場合は、脚註7のURLではなく、[Java SE Downloads](http://www.oracle.com/technetwork/java/javase/downloads/index.html)からJDKをダウンロードしてください。

#### Mac

**p. 23**

* [**動画**：JDK 1.7.0のインストール（Mac OS X v10.8 Mountain Lion）](http://youtu.be/gqzkhL6ItFQ)
* [**動画**：JDKのインストール（Mac OS X v10.7 Lion）](http://youtu.be/36R485Rul7I)

Mac OS X v10.7 Lion以降にはJDKが含まれていません。Javaが必要になった時にインストールを促すダイアログが現れるので、その指示に従ってください。

### 2.4.2 NetBeans

**p. 23** [**動画**：NetBeans 7.3.1のインストール（Ubuntu 12.04）](http://youtu.be/mmZQwtLBqSM)

NetBeansのインストール中に、JUnitについて訊かれたら、「JUnitをインストール」を選択してください。

### 2.4.3 Eclipse

#### Ubuntu

##### Java用のEclipse

###### Ubuntu

**p. 24** [**動画**：GlassFish Tools Bundle For Eclipseのインストール（Ubuntu 12.04）](http://youtu.be/NIgFt5u0fsY)

Ubuntu 12.04でダウンロードした`glassfish...install.jar`を実行する際は、TABキーによる補間が効かないようです。動画のように、`java -jar `まで入力してから、ファイルをターミナルにドラッグ＆ドロップするのが簡単です。

**p. 25** Ubuntu 12.04でGlassFish Tools Bundle For Eclipseを起動するときは、コンソールで「`~/glassfishBundle/eclipse`」とするのが簡単です。

**p. 25** [**動画**：EclipseのウェブブラウザをFirefoxに設定する（Eclipse 3.5.1, Ubuntu）](http://youtu.be/AaSF57DE7R8)

**（書籍不掲載の設定）** Eclipseが起動したら、Exlipse内蔵ウェブブラウザではなく、Firefoxを使うように設定します。Window→Preferences→General→Web Browser→「New...」で、Nameを`Firefox`、Locationを`/usr/bin/firefox`、Parametersを`-url %URL%`とします。（Firefox自体は3.1.1項で紹介しています。）

###### Windows

**p. 25** [**動画**：GlassFish Tools Bundle For Eclipseのインストール（Windows 7）](http://youtu.be/coh48h6F1wo)

##### PHP用のEclipse

**p. 24**

* [**動画**：PDT 3.2.0 with Eclipse 3.7.2 Indigoのインストールとウェブブラウザの設定（Ubuntu 12.04）](http://youtu.be/1E-wkGY8oc4)
* [**動画**：PDT 3.2.0 with Eclipse 3.7.2 Indigoのインストール（Windows 7）](http://youtu.be/ibFRZHfgEGY)
* [**動画**：PDT 3.2.0 with Eclipse 3.7.2 Indigoのインストール（Mac OS X v10.8 Mountain Lion）](http://youtu.be/WYRk79RSOKs)

## 2.5 プロジェクトの作成

### 2.5.1 Java Webアプリケーション

#### NetBeans

最初にできるファイルが`index.html`の場合と`index.jsp`の場合がありますが，いずれにしても，コードを右クリック→「ファイルの実行」で実行できます。

**p. 26** [**動画**：Java Webアプリケーションの作成（NetBeans 7.3.1）](http://youtu.be/NzNJ6M33QAo)

#### Eclipse

**p. 26**

* [**動画**：Java Webアプリケーションの作成（Eclipse 3.5.1, Ubuntu 12.04）](http://youtu.be/_22aPaskXx0)
* [**動画**：Java Webアプリケーションの作成（Eclipse 3.5.1, Windows 7）](http://youtu.be/y5J0h4UJPUw)
* [**動画**：Java Webアプリケーションの作成（Eclipse 3.5.1, Mac）](http://youtu.be/RqRFsQjYq-E)

### 2.5.2 PHPアプリケーション

#### NetBeans

**p. 28** [**動画**：PHPアプリケーションの作成（NetBeans 7.3.1）](http://youtu.be/sxnOdjB0qBM)

#### Eclipse

**p. 28**

* [**動画**：PHPアプリケーションの作成（Eclipse 3.7.2, Ubuntu 12.04）](http://youtu.be/8blBY1pQplY)
* [**動画**：PHPアプリケーションの作成（Eclipse 3.7.2, Windows）](http://youtu.be/0JfxMs3Jd-M)
* [**動画**：PHPアプリケーションの作成（Eclipse 3.7.2, Mac）](http://youtu.be/Y7nChTOC5_U)
* [**動画**：PHPアプリケーションの作成（Eclipse 3.5.1, Mac）](http://youtu.be/DcPCQK0qqgY)

EclipseでPHPアプリケーションを作成する際は、プロジェクトのディレクトリがApacheのドキュメントルート（Ubuntuなら`/var/www/`、Windowsなら`C:/xampp/htdocs`、Macなら`Library/WebServer/Documents`）に置かれるようにします。
