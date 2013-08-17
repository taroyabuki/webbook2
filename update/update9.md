# 9章 ウェブアプリの実例：補足

# 9.1 郵便番号データベース

### 9.1.1 データの準備

**p. 146** 郵便番号データ（lzhファイル）はホームディレクトリにダウンロードしたと仮定しています。~/ダウンロードにあるときは、`lha x ~/ダウンロード/ken_all.lzh`として展開します。

### 9.1.2 データのインポート

**p. 146** 「The used command is not allowed with this MySQL version.」というエラーが出たときは、一度コンソールに戻って、`mysql -uroot -ppass --local-infile`としてMySQLに接続してください。

## 9.2 GETによる検索

### 9.2.1 JSPでの実装

**p. 148** 郵便番号を送信していない時に空のtable要素が生成されるのが気になる時は以下のようにコードを修正してください。

* [zips.jsp](https://github.com/taroyabuki/webbook2/blob/master/src/09/zips.jsp)

### 9.2.1 PHPでの実装

**p. 149** 郵便番号を送信していない時に空のtable要素が生成されるのが気になる時は以下のようにコードを修正してください。

* [zips.php](https://github.com/taroyabuki/webbook2/blob/master/src/09/zips.php)

### 9.2.3 GETによる検索の動作確認と改良

**p. 150** 環境によってはzips.jspやzips.phpの結果が文字化けしますが、この段階では気にしなくてかまいません。これは、文字コードを指定がブラウザに送られていないためなのです。9.3節以降では、文字コードを指定しているので文字化けは起こりません。

## 9.5 Ajaxによるリアルタイム検索

**p. 155** ここで紹介したコードでは「search」ボタンは使えません。ボタンを使えるようにするためには、9.4節のコードが必要です。必要なコードを補ったものを、https://github.com/taroyabuki/webbook2/tree/master/src/09 で公開しています。

### コラム：GlassFishの単体利用

**p. 161** インストーラではなくzip archiveを使ってGlassFishを導入した時は`http://localhost:4848/`にアクセス、左の列の「Enterprise Server」をクリック、「管理者パスワード」をクリックし、適当なパスワードを設定します。

Ubuntuの起動時にGlassFishサーバも起動させたいときは、/etc/rc.localに`/opt/glassfishv3/bin/asadmin start-domain domain1`を追記します。
