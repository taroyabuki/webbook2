# 4章 ウェブブラウザ上で動作するプログラム：補足

## 4.1

`alert.html`

## 4.2

### 4.2.1

**p. 53** 書籍で紹介したjQueryの読み込み方は廃止された。jQueryは以下のように読み込む。

```html
<script src="https://code.jquery.com/jquery-2.2.3.min.js"></script>
```

### 4.2.2

`selector.html`

### 4.2.3

`ready.html`

### 4.2.4

`click.html`

## 4.4

* `console.html`
* `jsobject.html`

Firebugはインストールせず、以下のツールで代替する。いずれもF12で起動。

* FirefoxのWebコンソール
* Chromeのデベロッパーツール
* Internet ExplorerやEdgeの開発者ツール

## 4.5

Google Maps APIが使いにくくなったため、代わりにYahoo! JavaScriptマップAPIを使う。
そのためのサンプルを、https://github.com/taroyabuki/webdevelop で公開している。（Dockerで環境構築をしているが、本書の環境でも問題なく動作する．）

### 4.5.1

* `googlemaps.html`→[yahoomaps.html](https://github.com/taroyabuki/webdevelop/blob/master/html/phpweb/yahoomaps.html)
* `googlemaps.js`→[yahoomaps.js](https://github.com/taroyabuki/webdevelop/blob/master/html/phpweb/yahoomaps.js)

### 4.5.2

* `addressmaps.html`→[yaddressmaps.html](https://github.com/taroyabuki/webdevelop/blob/master/html/phpweb/yaddressmaps.html)
* `addressmaps.js`→[yaddressmaps.js](https://github.com/taroyabuki/webdevelop/blob/master/html/phpweb/yaddressmaps.js)
