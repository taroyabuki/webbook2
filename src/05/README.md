# 5章 ウェブの通信方式：補足

## 5.1 HTTP

**p. 61** 書籍で使っているFirebugの代わりに、Firefoxで`Ctrl+Shift+Q`として起動する「ネットワーク」を使ってください。図5.2のような情報は、最初のゲットメソッドを選択したときの「ヘッダ」タブで、図5.3のような情報は「パラメータ」タブで見られます。

## 5.2 HTTPクライアント

### 5.2.1 フォーム

* `google.html`
* `form.html`

### 5.2.2 HTTPクライアントとなるプログラム

#### PHPのHTTPクライアント

Ubuntuでは、まず次のコマンドを試します。これでPEARのHTTP_Requestをインストールできれば簡単です。

```bash
sudo apt-get install php-http-request
```

**p. 71** Windowsでpearコマンドを実行したときに、「Permission denied」というエラーが出るときは、コマンドプロンプトを管理者として起動してください（右クリック→管理者として実行）

pearのチャネルを更新するときは、`pear channel-update pear.php.net`とします。Windowsの場合はコマンドプロンプトを管理者として起動してください。GNU/LinuxやMacでは、先頭に「`sudo `」を付けてください。

**p. 71** [**動画**：PHP PEARの利用（Mac OS X v10.8 Mountain Lion）](http://youtu.be/XsFjv3Drrek)

Mac OS X v10.7 Lion以降では、PEARを使うために、以下のような作業が必要です。

1. 「`sudo php /usr/lib/php/install-pear-nozlib.phar`」としてPEARをインストールする。
1. 2.3.3項（p. 22）の要領で/etc/php.iniを編集し、「`include_path = ".:/php/includes:/usr/lib/php/pear"`」という行を追加する。
1. 「`sudo apachectl graceful`」としてApacheを再起動する。

### gettext.php

**p. 71** HTTP/Request.phpは非推奨になりましたが、それに関する警告等がうるさいときは、以下のコードを`require_once('HTTP/Request.php');`の前に追加してください。

```PHP
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
```

## 5.3 Twitter API

### 5.3.1 XMLの処理（Java）

**p. 72** TwitterのAPIが変更され、本書のコードは動かなくなりました。

#### 5.3.2 JSONの処理

**p. 73** TwitterのAPIが変更され、本書のコードは動かなくなりました。しかし、次のようにすれば、JSONの処理を体験できます。

まず、プロジェクトphpwebの中に、OAuthのためのライブラリを用意します。

```bash
sudo apt-get -y install git php5-curl
sudo service apache2 restart

cd /var/www/html/phpweb
git clone https://github.com/abraham/twitteroauth.git
```

1. https://apps.twitter.com/ で新しいアプリを作り、以下の4項目を取得する。
 * Consumer Key
 * Consumer Secret
 * Access Token
 * Access Token Secret
1. `home_timeline.json.php.template`のファイル名を`home_timeline.json.php`に変更し、ファイル中に上記4項目を記述する。
1. [http://localhost/phpweb/home_timeline.json.php](http://localhost/phpweb/home_timeline.json.php)が動作することを確認する。
1. `publictimeline.php`と`publictimeline.html`の`https://api.twitter.com/1/statuses/public_timeline.json`を`http://localhost/phpweb/home_timeline.json.php`に置き換える（ここで配布しているファイルは置き換え済み）。

### publictimeline.php

**p. 74 (脚註14)** PHP 5.4以降では、以下のようにすることでintの範囲（32ビット版と64ビット版で異なる）を超える整数を文字列として取り出せます。

```PHP
$json = json_decode($http_request->getREsponseBody(), true, 512, JSON_BIGINT_AS_STRING);
```
