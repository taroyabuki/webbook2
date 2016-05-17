# 6章 ダイナミックなページ生成：補足

## 6.3 リクエスト内容の取得

### 6.3.1 Javaによるリクエスト内容の取得

**p. 86 (サニタイジング)** Apache Commons Langは、バージョン2系列からバージョン3系列になりました。本書で採用していたのはバージョン2系列ですが、ここで配布するコードではバージョン3系列を採用しています。

Apache Commons Langのバージョン3系列は、「`sudo apt-get install libcommons-lang3-java`」でインストールできます。

コード中の「`org.apache.commons.lang.*`」は「`org.apache.commons.lang3.*`」に変更してください。

**p. 87** 動作確認のためのURL：[http://localhost:8080/javaweb/Parameters?firstname=Taro&lastname=Yabuki](http://localhost:8080/javaweb/Parameters?firstname=Taro&lastname=Yabuki)

### 6.3.2 PHPによるリクエスト内容の取得

**p. 88** 動作確認のためのURL：[http://localhost/phpweb/parameters.php?firstname=Taro&lastname=Yabuki](http://localhost/phpweb/parameters.php?firstname=Taro&lastname=Yabuki)

## 6.4 セッション

### 6.4.3 クッキー

**p. 91** Firebugがなくても、Firefoxで`Ctrl+Shilt+Q`とすれば、通信を観察できます。
