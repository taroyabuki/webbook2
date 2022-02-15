# 4章 ウェブブラウザ上で動作するプログラム：補足

## 4.1

[alert.html](alert.html)

## 4.2

### 4.2.1

**p. 53** 書籍で紹介したjQueryの読み込み方は廃止された。jQueryは以下のように読み込む。

```html
<script src="https://code.jquery.com/jquery-2.2.3.min.js"></script>
```

### 4.2.2

[selector.html](selector.html)

### 4.2.3

[ready.html](ready.html)

### 4.2.4

[click.html](click.html)

## 4.4

* [console.html](console.html)
* [jsobject.html](jsobject.html)

Firebugはインストールせず、以下のツールで代替する。いずれもF12で起動。

* FirefoxのWebコンソール
* Chromeのデベロッパーツール
* Internet ExplorerやEdgeの開発者ツール

## 4.5

Google Maps APIが使いにくくなったため、代わりに~~Yahoo! JavaScriptマップAPI~~地理院タイルを使う。
そのためのサンプルを、https://github.com/taroyabuki/webdevelop で公開している。（Dockerで環境構築をしているが、本書の環境でも問題なく動作する．）

### 4.5.1

* googlemaps.html→[gsimaps.html](https://github.com/taroyabuki/webdevelop/blob/master/html/phpweb/gsimaps.html)
* googlemaps.js→[gsimaps.js](https://github.com/taroyabuki/webdevelop/blob/master/html/phpweb/gsimaps.js)

### 4.5.2

* addressmaps.html→[gsiaddressmaps.html](https://github.com/taroyabuki/webdevelop/blob/master/html/phpweb/gsiaddressmaps.html)
* addressmaps.js→[gsiaddressmaps.js](https://github.com/taroyabuki/webdevelop/blob/master/html/phpweb/gsiaddressmaps.js)
