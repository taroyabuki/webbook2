# 4章 ウェブブラウザ上で動作するプログラム：補足

## 4.2 jQuery

### 4.2.1 jQueryの導入

**p. 53** 書籍で紹介した方法とは別に、以下のような記述でもjQueryを導入できます（参考：[Google Hosted Libraries](https://developers.google.com/speed/libraries/devguide?hl=ja#jquery)）書籍の方法は、jQuery 1.7.2以降では使えません。

```html
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.5.0/jquery.min.js"></script>
```

この記法には、httpとhttpsの両方に対応できるというメリットがあります。しかし、ウェブサーバで配信しない場合（file://...）には対応できません。そのような場合には、次のように書くといいでしょう。

```html
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.0/jquery.min.js"></script>
```

## 4.4 FirebugによるJavaScriptの動作の調査

**p. 55** Firefoxのバージョンによっては、「表示」メニュー→FirebugでFirebugを起動するものがあります。Firebugのアイコンが右下ではなく右上にある場合もあります。

## 4.5 Google Maps API

### 4.5.1 指定した位置（緯度・経度）を中心とする地図

