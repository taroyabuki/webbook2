# 補足

**p. 19（2.2.2 Guest Additionsのインストール）**

Guest Additionsに相当するプログラムを以下の手順で簡単にインストールできます（つまり、2.2.2項の作業は不要です）。プロキシサーバを使う環境では、2.2.4項の設定を先に済ませてください。

1. アプリケーション→アクセサリ→端末
1. `sudo apt-get update`
1. パスワードを訊かれたら入力する
1. `sudo apt-get install virtualbox-ose-guest-utils`
1. 再起動する（`sudo reboot`）

**p. 20（2.2.4 プロキシサーバの設定）**

サーバ情報を入力したら、「システム全体に適用」をクリックしてください。

**p. 20（2.3.1 Ubuntu）**

「端末」は「Ctrl + Alt + T」で起動します。

**p. 21（2.3.2 Windows）**

XAMPPはhttp://www.apachefriends.org/jp/xampp-windows.html で公開されています。

**p. 22（2.3.3 Mac）**

Ubuntuの場合(p. 21)と同様、以下のようにしてドキュメントルートを書き込み可能にしておきます。

```bash
sudo chmod 775 /Library/WebServer/Documents
chown root:admin /Library/WebServer/Documents
```

エラーメッセージを表示させる必要が無い場合も、php.iniは作成してください。そうしないと、magic_quotes_gpcがOffになりません。

**p. 22（GlassFishと統合開発環境）**

2.4.2 NetBeansと2.4.3 Eclipseは、どちらか一方だけでかまいません。

**p. 23（2.4.2 NetBeans）**

NetBeansのインストール中に、JUnitについて訊かれたら、「JUnitをインストール」を選択してください。

**p. 24（2.4.2 NetBeans, 2.4.3 Eclipse）**

コンソールで「ダウンロード」とか入力するのが面倒な人は、`LANG=C xdg-user-dirs-gtk-update`を実行して、特殊なディレクトリの名前を英語に変更してください。

**p. 24（2.4.3 Eclipse）**

JavaとPHPで異なるEclipseを使う（非推奨）：Eclipse上でPHPのウェブアプリを開発したい場合は、Eclipse for PHP Developerの代わりに、Zend Software Development Kitを使ってください。http://code.google.com/p/zend-sdk/ からダウンロードできます。

JavaとPHPで同じEclipseを使う（推奨）：本書で利用しているEclipseであるGalileo（バージョン3.5.1）にPDTを追加するには、HELP→「Install New Software...」→「Add...」ボタンを押すと現れる「Add Site」ダイアログで、Nameを`Galileo`（これは任意）、Location:を`http://download.eclipse.org/releases/galileo/`として登録したサイトに対して、type filter textに「pdt」を入力すると現れる「PHP Development Tools (PDT) SDK Feature」を選択します。

**p. 26（2.5.1 EclipseでJavaプロジェクトを実行する時の注意）**

Eclipseの中でページが開かれないときは、ウェブブラウザで`http://localhost:8084/javaweb/`にアクセスしてください。

プロキシサーバを利用する環境では、Eclipse内蔵のウェブブラウザで`http://localhost:8084/javaweb/index.jsp`にアクセスしようとしても、`http://www.localhost.com/javaweb/index.jsp`にアクセスしてしまいます。この問題は、以下のいずれかの方法で解決できます（参考：http://stackoverflow.com/questions/3396485/eclipse-help-wont-show-under-ubuntu ）。

* Window→Web Browser→Default system Web browser、これによって、Eclipse内蔵のウェブブラウザの代わりにFirefoxが使われるようになる。
* コンソールで、`cd ~/glassfishBundle`、`export no_proxy=127.0.0.1,localhost`、`./eclipse &`としてEclipseを起動する。

**p. 29（2.5.2 PHPアプリケーション）**

ウェブブラウザが起動しない場合は、Firefoxを使うように設定してください。Window→Preferences→General→Web Browser→「New...」で、Nameを`Firefox`、Locationを`/usr/bin/firefox`、Parametersを`-url %URL%`とします。

**p. 31（3.2 HTML入門）**

Windowsでは、エクスプローラで拡張子が表示されるように設定しておくといいでしょう。

**p. 35（3.3 統合開発環境とウェブサーバの利用）**

ウェブブラウザのアドレス欄は、PHPで試している場合は`http://localhost/phpweb/hello.html`、Javaで試している場合は`http://localhost/javaweb/hello.html`になります。

**p. 55（4.4 FirebugによるJavaScriptの動作の調査）**

Firefoxのバージョンによっては、「表示」メニュー→FirebugでFirebugを起動するものがあります。Firebugのアイコンが右下ではなく右上にある場合もあります。

**p. 61（5.1 HTTP）**

この節では、HTTP通信の内容を調べるために、FirefoxのアドオンであるFirebugを使っています。Firebugは4.4節でインストールしています。4.4節を飛ばした場合でも、Firebugのインストールだけは済ませて先に進んでください。

**p. 71（pearコマンドのためのプロキシ設定（Windows））**

「Permission denied」というエラーが出るときは、コマンドプロンプトを管理者として起動してください（右クリック→管理者として実行）

pearのチャネルを更新するときは、`pear channel-update pear.php.net`とします。Windowsの場合はコマンドプロンプトを管理者として起動してください。GNU/LinuxやMacでは、先頭に「`sudo `」を付けてください。

**p. 72**

http://api.twitter.com/1/statuses/public_timeline.xml は以下のような構造になっています。

```
＜statuses＞
  ＜status＞
    ...
    ＜text＞プログラミングなう＜/text＞
    ...
    ＜user＞
      ...
      ＜name＞...＜/name＞
      ...
    ＜/user＞
    ...
  ＜/status＞
  ...
＜/statuses＞
```

**p. 84の脚注6（B.3.2）, p. 87の脚注9（B.3.3）**

関連する話題：[文字エンコーディングバリデーションは自動化が望ましい](http://www.tokumaru.org/d/20090918.html)

**p. 86（サニタイジング）**

Apache Commons Langは、バージョン2系列とバージョン3系列があります。本書で採用しているのはバージョン2系列です。バージョン3系列を採用する場合は、`sudo apt-get install libcommons-lang3-java`などとし、ソースコードの`org.apache.commons.lang.*`を`org.apache.commons.lang3.*`に変更してください。

**p. 94（7.2.1 MySQLのインストール）**

Windows 7の標準ユーザがPATHを変更するには、「コントロールパネル→ユーザー アカウントと家族のための安全設定→ユーザー アカウント→環境変数の変更」です。管理者もこの方法でPATHを変更できます。コントロールパネルの検索窓に「環境変数」と入力してもいいでしょう。

**p. 106（7.6.1 phpMyAdminのインストール）**

phpMyAdminのインストールにおいて、図7.4の設定などをし忘れたときは、`sudo apt-get purge phpmyadmin`として、一度アンインストールしてから、再インストールしてください。

Macでは、/etc/php.iniのmysqli.default_socketを確認してください。`sudo / -name mysql.sock`などとしてmysql.sock（あるいはmysqld.sock）の場所を確認してから、`sudo vi /etc/php.ini`としてphp.iniに反映し、`sudo apachectl restart`として適用します。以下は例です。viの使い方はいろんなところで紹介されているのでここでは割愛します。

```
mysqli.default_socket = /private/tmp/mysql.sock
```

**p. 113（パフォーマンスチューニング）**

あらかじめ用意されている設定ファイルを使う際の注意：[MySQLのテンプレ設定ファイルの使い方](http://blog.unfindable.net/archives/2663)

**p. 135（8.2.3 PHPからデータベースへのアクセス）**

パッケージphp5-mysqlが必要です。7.6.1項で紹介するphpMyAdminといっしょにインストールされますが、`sudo apt-get install php5-mysql`としてインストールしてもかまいません。

Macでは、/etc/php.iniのmysqli.default_socketを確認してください。`sudo / -name mysql.sock`などとしてmysql.sock（あるいはmysqld.sock）の場所を確認してから、`sudo vi /etc/php.ini`としてphp.iniに反映し、`sudo apachectl restart`として適用します。以下は例です。viの使い方はいろんなところで紹介されているのでここでは割愛します。

```
pdo_mysql.default_socket=/private/tmp/mysql.sock
```

**p. 146**

郵便番号データ（lzhファイル）はホームディレクトリにダウンロードしたと仮定しています。~/ダウンロードにあるときは、`lha x ~/ダウンロード/ken_all.lzh`として展開します。

**p. 146（9.1.2 データのインポート）**

「The used command is not allowed with this MySQL version.」というエラーが出たときは、一度コンソールに戻って、`mysql -uroot -ppass --local-infile`としてMySQLに接続してください。

**p. 148, 149（zips.jsp, zips.php）**

郵便番号を送信していない時に空のtable要素が生成されるのが気になる時は以下のようにコードを修正してください。

* [Java版](https://github.com/taroyabuki/webbook2/blob/master/src/09/zips.jsp)
* [PHP版](https://github.com/taroyabuki/webbook2/blob/master/src/09/zips.php)

**p. 150（9.2.3 GETによる検索の動作確認と改良）**

環境によってはzips.jspやzips.phpの結果が文字化けしますが、この段階では気にしなくてかまいません。これは、文字コードを指定がブラウザに送られていないためなのです。9.3節移行では、文字コードを指定しているので文字化けは起こりません。

**p. 155（9.5 Ajaxによるリアルタイム検索）**

ここで紹介したコードでは「search」ボタンは使えません。ボタンを使えるようにするためには、9.4節のコードが必要です。必要なコードを補ったものを、https://github.com/taroyabuki/webbook2/tree/master/src/09 で公開しています。

**p. 161（GlassFishの単体利用）**

インストーラではなくzip archiveを使ってGlassFishを導入した時は`http://localhost:4848/`にアクセス、左の列の「Enterprise Server」をクリック、「管理者パスワード」をクリックし、適当なパスワードを設定します。

Ubuntuの起動時にGlassFishサーバも起動させたいときは、/etc/rc.localに`/opt/glassfishv3/bin/asadmin start-domain domain1`を追記します。

**p. 166（A.2.1 文字列 脚註5）**

「マルチスレッドにしたい場合は」というのは、「複数のスレッドからアクセスされる可能性があるときに、排他制御を実現したいときは」ということです。
