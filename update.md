# 新しいバージョンへの対応

動作を確認したバージョン（**太字**は本書の発行後に確認したもの）

* VirtualBox 3.2, 4.0, **4.1以上**
* Firefox 3.6, **4以上** (各OS用のHTML Validatorが提供されている9以上がおすすめです)
* Apache HTTP Server 2.2
* GlassFish 3, **3.1**
* MySQL 5.1, **5.5**
* NetBeans 6.9.1, **7.1以上**
* Eclipse 3.5.1
* Java 6, **7**
* PHP 5.3
* jQuery 1.5.0, **1.6以上**
* XAMPP 1.7.3, **1.7.7**
* Ubuntu 10.04, **11.04, 11.10, 12.04**
* Windows XP, Vista, 7
* Mac OS X 10.6, **10.7**

Ubuntu 11.04では、Unityと呼ばれる新しいデスクトップが採用されています。本書の説明のとおり、つまりUnityを使わずに作業したいときは、ログイン画面で「Ubuntu クラシック」を選択してください。

**p. 19 (2.2.3 キーボードの設定)**

Ubuntu 11.04などで導入されているUnityでは、「iBusの設定」がわかりにくくなっています。Dashメニューの検索窓に「ibus」と入力すると、「Keyboard Input Methods」あるいは「キーボード・インプット」という項目が現れるのでそれをクリックしてください。図2.8のようなウィンドウが現れます。

**p. 20 (2.2.4 プロキシサーバの設定)**

Ubuntu 12.04のUnityでは、右上の電源アイコンをクリック→「システム設定」→「ネットワーク」→「ネットワークプロキシ」→メソッドを「手動」にすると、図2.9のようなウィンドウが現れます。左上のアイコンをクリックして「network」と入力してもいいでしょう。

**p. 21 (2.3.1 Ubuntu)**

ディレクトリ/var/wwwを書き込み可能にするためのコマンドは、本文の代わりに以下のものを使ってください（Ubuntu 12.04への対応ですが、10.04でも有効です）。

```bash
sudo chmod 775 /var/www
sudo chown root:adm /var/www
```

**p.23 (2.4.1 Java Development Kit)**

Ubuntu 12.04ではJava 7を簡単に導入できます。p.23のコマンドの代わりに、以下のコマンドを実行してください。

```bash
sudo apt-get install openjdk-7-jdk
```

WindowsでJava 7を使う場合は、p.23 脚註7のURLではなく、[Java SE Downloads](http://www.oracle.com/technetwork/java/javase/downloads/index.html)からJDKをダウンロードしてください。

Mac OS 10.7以降にはJDKが含まれていません。Javaが必要になった時にインストールを促すダイアログが現れるので、その指示に従ってください。インストールの様子は[解説動画](https://github.com/taroyabuki/webbook2/blob/master/movies.md)で見られます。

**p. 25 (2.4.3 Eclipse)**

Ubuntu 12.04でEclipseを起動するときは、Dash メニューで「eclipse」を検索してください。見つからないときは、コンソールで「~/glassfishBundle/eclipse」として起動してください。

**p. 31 (Firefoxのバージョンアップ)**

Firefoxのバージョンによっては、対応するHTML Validatorがない場合があるので注意してください。HTML Validatorの最新情報は、http://users.skynet.be/mgueury/mozilla/ でチェックしてください。

**p. 37 (3.5 HTML Validator)**

Firefox 4では`Ctrl + /`でアドオンバーを表示させてください。

**p. 86 (サニタイジング)**

Apache Commons Langは、バージョン2系列とバージョン3系列があります。本書で採用しているのはバージョン2系列です。バージョン3系列を採用する場合は、「sudo apt-get install libcommons-lang3-java」などとし、ソースコードの「org.apache.commons.lang.*」を「org.apache.commons.lang3.*」に変更してください。

**p. 106 (7.6.1 phpMyAdminのインストール)**

MacでphpMyAdminにログインできないときは、[補足](https://github.com/taroyabuki/webbook2/blob/master/supplement.md)を参考に、/etc/php.iniのmysqli.default_socketの設定を確認してください。

**p. 135 (8.2.3 PHPからデータベースへのアクセス)**

MacでPHPからMySQLにアクセスできないときは、[補足](https://github.com/taroyabuki/webbook2/blob/master/supplement.md)を参考に、/etc/php.iniのpdo_mysql.default_socketの設定を確認してください。
