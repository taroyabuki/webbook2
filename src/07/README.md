# 7章 データベースの操作：補足

## 7.2 MySQL

### 7.2.1 MySQLのインストール

#### Ubuntu

**p. 94** [**動画**：MySQLとphpMyAdmin（7.6節）のインストール（Ubuntu 12.04）](http://youtu.be/2-ZEPX8oU3U)

#### Windows

**p. 94** Windows 7の標準ユーザがPATHを変更するには、「コントロールパネル→ユーザー アカウントと家族のための安全設定→ユーザー アカウント→環境変数の変更」です。管理者もこの方法でPATHを変更できます。コントロールパネルの検索窓に「環境変数」と入力してもいいでしょう。

#### Mac

**p. 94** [**動画**：MySQL 5.6のインストール（Mac OS X v10.8 Mountain Lion）](http://youtu.be/3Zn_SPvmz-o)

## 7.4 MySQLの文字コード

### 7.4.1 クライアント側の文字コード

MySQL 5.6以降では、mysql.exeをUTF-8で対話的に使えます（Windows Vista以降）。コマンドプロンプトのプロパティでフォントをMS ゴシックに変更してから、「`chcp 65001`」としてコマンドプロンプトの文字コードをUTF-8に変更してください。（参考：[mysql.exeでUTF-8を使う](http://blog.unfindable.net/archives/7144)）

## 7.6 phpMyAdmin

### 7.6.1 phpMyAdminのインストール

**p. 106** phpMyAdminのインストールにおいて、図7.4の設定などをし忘れたときは、`sudo apt-get purge phpmyadmin`として、一度アンインストールしてから、再インストールしてください。

#### Ubuntu

**p. 106** [**動画**：MySQL（7.1節）とphpMyAdminのインストール（Ubuntu 12.04）](http://youtu.be/2-ZEPX8oU3U)

#### Mac

**p. 107** [**動画**：phpMyAdminのインストール（Mac OS X v10.8 Mountain Lion）](http://youtu.be/cLf5XuB3W0Y)

Macでは/etc/php.iniにおける`mysqli.default_socket`の値（例：`/var/mysql/mysql.sock`）と、実際のファイル（例：/tmp/mysql.sock）が一致していないことがあります。この例のように一致していない場合は、次のように修正します（MySQL 5.6 on Mac OS X v10.8 Mountain Lionの場合）。

```
sudo mkdir /var/mysql
sudo ln -s /tmp/mysql.sock /var/mysql/mysql.sock
sudo apachectl restart
```

### コラム：パフォーマンスチューニング

**p. 113** 
あらかじめ用意されている設定ファイルを使う際の注意：[MySQLのテンプレ設定ファイルの使い方](http://blog.unfindable.net/archives/2663)
