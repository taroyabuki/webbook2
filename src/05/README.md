# 5章 ウェブの通信方式：補足

## 5.1 HTTP

**p. 61** 書籍で使っているFirebugの代わりに、Firefoxで`Ctrl+Shift+Q`として起動する「ネットワーク」を使ってください。図5.2のような情報は、最初のゲットメソッドを選択したときの「ヘッダ」タブで、図5.3のような情報は「パラメータ」タブで見られます。

## 5.2 HTTPクライアント

### 5.2.1 フォーム

* [google.html](google.html)
* [form.html](form.html)

### 5.2.2 HTTPクライアントとなるプログラム

#### PHPのHTTPクライアント

Ubuntu 12.04と14.04では、次のコマンドでPEAR HTTP/Requestをインストールします。Ubuntu 16.04ではPEAR HTTP/Requestを使えないので、gettext2.phpの方法を使ってください。

```bash
sudo apt-get -y install php-http-request
sudo service apache2 restart
```

##### [gettext.php](gettext.php)

**p. 71**

(Ubuntu 12.04, 14.04) PEAR HTTP/Requestは非推奨になりましたが、それに関する警告等がうるさいときは、以下のコードを`require_once('HTTP/Request.php');`の前に追加してください。（ここで公開しているファイルでは追加済みです。）

```PHP
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
```

## 5.3 Twitter API

### 5.3.1 XMLの処理（Java）

**p. 72** TwitterのAPIが変更され、本書のコードは動かなくなりました。

### 5.3.2 JSONの処理

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
1. `home_timeline.json.php.template`をもとに`home_timeline.json.php`を作り、ファイル中に上記4項目を記述する。
1. [http://localhost/phpweb/home_timeline.json.php](http://localhost/phpweb/home_timeline.json.php)が動作することを確認する。
1. `publictimeline.html`の`https://api.twitter.com/1/statuses/public_timeline.json`を`http://localhost/phpweb/home_timeline.json.php`に置き換える。（ここで配布しているファイルは置き換え済み）
1. **(Ubuntu 12.04, 14.04)** `publictimeline.php`についても上と同じ修正を施す。
1. **(Ubuntu 16.04)** PEAR HTTP/Requestが使えなくなったため、`publictimeline.php`の代わりに`home_timeline.php`を使う。

次のようにして、コンソール上でJSONを整形して表示できます。（`q`で終了）

```
sudo apt-get -y install jq
curl http://localhost/phpweb/home_timeline.json.php | jq .
```

**p. 73 脚註13** JavaにはJavaScriptのエンジンが含まれているため、それを使ってJSONを処理できます。上述のhttp://localhost/phpweb/home_timeline.json.php が動く環境で、`HomeTimeline.java`を試してください。

`HomeTimeline.java`が冗長だと感じる場合は、`HomeTimeline2.java`を試してください。[Apache HTTP ComponentsのFluent API](https://hc.apache.org/httpcomponents-client-ga/tutorial/html/fluent.html)を使ってHTTP通信を、Java 8のラムダ式を使ってループ処理を簡略化したものです。Maven Javaアプリケーション・プロジェクトを作り、以下のような要素を`pom.xml`の`project`要素に追加することで実行できます。

```xml
<dependencies>
  <dependency>
    <groupId>org.apache.httpcomponents</groupId>
    <artifactId>fluent-hc</artifactId>
    <version>4.5.2</version>
  </dependency>
</dependencies>
```

#### publictimeline.php

**p. 74 脚註14** PHP 5.4以降では、以下のようにすることでintの範囲（32ビット版と64ビット版で異なる）を超える整数を文字列として取り出せます。

```PHP
$json = json_decode($http_request->getREsponseBody(), true, 512, JSON_BIGINT_AS_STRING);
```
