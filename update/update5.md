# 5章 ウェブの通信方式

## 5.1 HTTP

**p. 61** この節では、HTTP通信の内容を調べるために、FirefoxのアドオンであるFirebugを使っています。Firebugは4.4節でインストールしています。4.4節を飛ばした場合でも、Firebugのインストールだけは済ませて先に進んでください。Ubuntu 14.04のFirefoxでは、`Ctrl+Shift+Q`で起動する「ネットワーク」を使ってもかまいません。図5.2のような情報は「ヘッダ」タブで、図5.3のような情報は「パラメータ」タブで見られます。

## 5.2 HTTPクライアント

### 5.2.2 HTTPクライアントとなるプログラム

#### PHPのHTTPクライアント

**p. 71** Windowsでpearコマンドを実行したときに、「Permission denied」というエラーが出るときは、コマンドプロンプトを管理者として起動してください（右クリック→管理者として実行）

pearのチャネルを更新するときは、`pear channel-update pear.php.net`とします。Windowsの場合はコマンドプロンプトを管理者として起動してください。GNU/LinuxやMacでは、先頭に「`sudo `」を付けてください。

**p. 71** [**動画**：PHP PEARの利用（Mac OS X v10.8 Mountain Lion）](http://youtu.be/XsFjv3Drrek)

Mac OS X v10.7 Lion以降では、PEARを使うために、以下のような作業が必要です。

1. 「`sudo php /usr/lib/php/install-pear-nozlib.phar`」としてPEARをインストールする。
1. 2.3.3項（p. 22）の要領で/etc/php.iniを編集し、「`include_path = ".:/php/includes:/usr/lib/php/pear"`」という行を追加する。
1. 「`sudo apachectl graceful`」としてApacheを再起動する。

### gettext.php

**p. 71** HTTP/Request.phpは非推奨になりましたが、それに関する警告等がうるさいときは、以下のコードを`require_once()`の前に追加してください。

```PHP
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
```

## 5.3 Twitter API

**p. 71** TwitterのAPIが変更されたので、「`https://api.twitter.com/1/statuses/public_timeline.xml`」の代わりに「`http://labs.unfindable.net/public_timeline/xml.php`」を、「`https://api.twitter.com/1/statuses/public_timeline.json`」の代わりに「`http://labs.unfindable.net/public_timeline/json.php`」を使ってください。（詳細：[Twitter APIのパブリックタイムラインが亡くなっていました](http://blog.unfindable.net/archives/5603)）

### 5.3.1 XMLの処理（Java）

**p. 72** http://api.twitter.com/1/statuses/public_timeline.xml は以下のような構造になっています。

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

####5.3.2 JSONの処理

### publictimeline.php

**p. 74** HTTP/Request.phpは非推奨になりましたが、それに関する警告等がうるさいときは、以下のコードを`require_once()`の前に追加してください。

```PHP
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
```

**p. 74 (脚註14)** PHP 5.4以降では、以下のようにすることでintの範囲（32ビット版と64ビット版で異なる）を超える整数を文字列として取り出せます。

```PHP
$json = json_decode($http_request->getREsponseBody(), true, 512, JSON_BIGINT_AS_STRING);
```
