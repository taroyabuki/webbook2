# 6章 ダイナミックなページ生成：補足

## 6.3 リクエスト内容の取得

### 6.3.1 Javaによるリクエスト内容の取得

**p. 86 (サニタイジング)** Apache Commons Langは、バージョン2系列とバージョン3系列があります。本書で採用しているのはバージョン2系列です。バージョン3系列を採用する場合は、「`sudo apt-get install libcommons-lang3-java`」などとし、ソースコードの「`org.apache.commons.lang.*`」を「`org.apache.commons.lang3.*`」に変更してください。

### 6.3.2 PHPによるリクエスト内容の取得

**p. 88** 動作確認のためのURL：[http://localhost/phpweb/parameters.php?firstname=Taro&lastname=Yabuki](http://localhost/phpweb/parameters.php?firstname=Taro&lastname=Yabuki)

## 6.4 セッション

### 6.4.3 クッキー

**p. 91** Firebugがなくても、Firefoxで`Ctrl+Shilt+Q`とすれば、通信を観察できます。
