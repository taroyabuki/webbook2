# 2章 開発環境の構築：補足

## 2.2 仮想マシンの構築

### 2.2.1 仮想マシンの新規作成

**p. 16** 新しいバージョンのVirtualBoxでは、仮想マシンの作成手続きが、本書に掲載したものとは少し違っています。基本的には、デフォルトのまま作成手続きを進めてかまいません。（[動画](http://youtu.be/HMGZSxsU_CQ)）

* 図2.4の前に仮想ハードドライブのファイルタイプを訊かれたら、「VDI」を選択してください（デフォルト）。
* 物理ハードドライブにあるストレージは、「可変サイズ」を選択してください（デフォルト）。

### 2.2.2 Guest Additionsのインストール

**p. 19** Guest Additionsをインストールする前に、以下のようにしてパッケージを更新しておきましょう。

```bash
sudo apt-get update
sudo apt-get upgrade
sudo reboot
```

Guest Additionsに相当するプログラムを以下の手順で簡単にインストールできます。つまり、2.2.2項の作業は不要です。ただし、VirtualBoxのバージョンによっては、うまく機能しないこともあるようです。ウィンドウサイズが動的に変更できないようなときは、2.2.2項の方法を試してください。

1. プロキシサーバを使う環境では、2.2.4項の設定をする
1. アプリケーション→アクセサリ→端末（あるいは`Ctrl + Alt + T`）
1. `sudo apt-get install virtualbox-ose-guest-utils`
1. パスワードを訊かれたら入力する
1. 再起動する（`sudo reboot`）

### 2.2.3 キーボードの設定

**p. 19** Ubuntu 11.04などで導入されているUnityでは、「iBusの設定」がわかりにくくなっています。Dashメニューの検索窓に「ibus」と入力すると、「Keyboard Input Methods」あるいは「キーボード・インプットメソッド」という項目が現れるのでそれをクリックしてください。図2.8のようなウィンドウが現れます。（[動画](http://youtu.be/nZZJxYX-FHk)）

### 2.2.4 プロキシサーバの設定

**p. 20** サーバ情報を入力したら、「システム全体に適用」をクリックしてください。

**p. 20** Ubuntu 12.04のUnityでは、右上の電源アイコンをクリック→「システム設定」→「ネットワーク」→「ネットワークプロキシ」→メソッドを「手動」にすると、図2.9のようなウィンドウが現れます。左上のアイコンをクリックして「network」と入力してもいいでしょう。

## Apache HTTP ServerとPHP

### 2.3.1 Ubuntu

**p. 20** 「端末」は「`Ctrl + Alt + T`」で起動します。

**p. 21** ディレクトリ/var/wwwを書き込み可能にするためのコマンドは、本文の代わりに以下のものを使ってください（Ubuntu 12.04への対応ですが、10.04でも有効です）。（[動画](http://youtu.be/LBU6ihgCEuk)）

```bash
sudo chmod 775 /var/www
sudo chown root:adm /var/www
```

### 2.3.2 Windows

**p. 21** XAMPPはhttp://www.apachefriends.org/jp/xampp-windows.html で公開されています。

### 2.3.3 Mac

**p. 22** Ubuntuの場合(p. 21)と同様、以下のようにしてドキュメントルートを書き込み可能にしておきます。

```bash
sudo chmod 775 /Library/WebServer/Documents
chown root:admin /Library/WebServer/Documents
```

エラーメッセージを表示させる必要が無い場合も、php.iniは作成してください。そうしないと、magic_quotes_gpcがOffになりません。

## 2.4 GlassFishhと統合開発環境

2.4.2 NetBeansと2.4.3 Eclipseは、どちらか一方だけでかまいません。

Ubuntuのコンソールで「ダウンロード」などど入力するのが面倒な人は、`LANG=C xdg-user-dirs-gtk-update`を実行して、特殊なディレクトリの名前を英語に変更してください。

### 2.4.1 Java Development Kit

**p. 23** Ubuntu 12.04ではJava 7を簡単に導入できます。p. 23のコマンドの代わりに、以下のコマンドを実行してください。

```bash
sudo apt-get install openjdk-7-jdk
```

WindowsでJava 7を使う場合は、p. 23 脚註7のURLではなく、[Java SE Downloads](http://www.oracle.com/technetwork/java/javase/downloads/index.html)からJDKをダウンロードしてください。

Mac OS 10.7以降にはJDKが含まれていません。Javaが必要になった時にインストールを促すダイアログが現れるので、その指示に従ってください。（[動画](http://youtu.be/36R485Rul7I)）

### 2.4.2 NetBeans

**p. 23** NetBeansのインストール中に、JUnitについて訊かれたら、「JUnitをインストール」を選択してください。

### 2.4.3 Eclipse

**p. 24**

* JavaとPHPで異なるEclipseを使う（非推奨）：Eclipse上でPHPのウェブアプリを開発したい場合は、Eclipse for PHP Developerの代わりに、Zend Software Development Kitを使ってください。http://code.google.com/p/zend-sdk/ からダウンロードできます。
* JavaとPHPで同じEclipseを使う（推奨）：本書で利用しているEclipseであるGalileo（バージョン3.5.1）にPDTを追加するには、HELP→「Install New Software...」→「Add...」ボタンを押すと現れる「Add Site」ダイアログで、Nameを`Galileo`（これは任意）、Location:を`http://download.eclipse.org/releases/galileo/`として登録したサイトに対して、type filter textに「pdt」を入力すると現れる「PHP Development Tools (PDT) SDK Feature」を選択します。

**p. 25** Ubuntu 12.04でEclipseを起動するときは、Dash メニューで「eclipse」を検索してください。見つからないときは、コンソールで「`~/glassfishBundle/eclipse`」として起動してください。

## 2.5 プロジェクトの作成

### 2.5.1 Java Webアプリケーション

**p. 26** Eclipseの中でページが開かれないときは、ウェブブラウザで`http://localhost:8084/javaweb/`にアクセスしてください。

**p. 26** プロキシサーバを利用する環境では、Eclipse内蔵のウェブブラウザで`http://localhost:8084/javaweb/index.jsp`にアクセスしようとしても、`http://www.localhost.com/javaweb/index.jsp`にアクセスしてしまいます。この問題は、以下のいずれかの方法で解決できます（参考：http://stackoverflow.com/questions/3396485/eclipse-help-wont-show-under-ubuntu ）。

* Window→Web Browser→Default system Web browser、これによって、Eclipse内蔵のウェブブラウザの代わりにFirefoxが使われるようになる。
* コンソールで、`cd ~/glassfishBundle`、`export no_proxy=127.0.0.1,localhost`、`./eclipse &`としてEclipseを起動する。

### 2.5.2 PHPアプリケーション

**p. 29** ウェブブラウザが起動しない場合は、Firefoxを使うように設定してください。Window→Preferences→General→Web Browser→「New...」で、Nameを`Firefox`、Locationを`/usr/bin/firefox`、Parametersを`-url %URL%`とします。
