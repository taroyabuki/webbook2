# 7章 データベースの操作：補足

## 7.2 MySQL

### 7.2.1 MySQLのインストール

**p. 94** Windows 7の標準ユーザがPATHを変更するには、「コントロールパネル→ユーザー アカウントと家族のための安全設定→ユーザー アカウント→環境変数の変更」です。管理者もこの方法でPATHを変更できます。コントロールパネルの検索窓に「環境変数」と入力してもいいでしょう。

## 7.6 phpMyAdmin

### 7.6.1 phpMyAdminのインストール

**p. 106** phpMyAdminのインストールにおいて、図7.4の設定などをし忘れたときは、`sudo apt-get purge phpmyadmin`として、一度アンインストールしてから、再インストールしてください。

**p. 106** Macでは、/etc/php.iniのmysqli.default_socketを確認してください。`sudo / -name mysql.sock`などとしてmysql.sock（あるいはmysqld.sock）の場所を確認してから、`sudo vi /etc/php.ini`としてphp.iniに反映し、`sudo apachectl restart`として適用します。以下は例です。viの使い方はいろんなところで紹介されているのでここでは割愛します。

```
mysqli.default_socket = /private/tmp/mysql.sock
```

### コラム：パフォーマンスチューニング

**p. 113** 
あらかじめ用意されている設定ファイルを使う際の注意：[MySQLのテンプレ設定ファイルの使い方](http://blog.unfindable.net/archives/2663)
