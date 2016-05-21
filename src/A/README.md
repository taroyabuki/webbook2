# 付録A CプログラマのためのJava：補足

## A.2 クラスライブラリ

### A.2.1 文字列

**p. 166 脚註5** 「マルチスレッドにしたい場合は」というのは、「複数のスレッドからアクセスされる可能性があるときに、排他制御を実現したいときは」ということです。

### A.2.2 暦

**(p. 169)** Java 8では日時を表現するための新しい仕組み、[Date-Time API](https://docs.oracle.com/javase/jp/8/docs/api/java/time/package-summary.html)が導入されました（使いやすいかどうかは議論のあるところかもしれません）。

## A.4 コレクション

**(p. 172)** Java 7で導入されたダイヤモンド演算子によって、

```Java
List<String> members = new ArrayList<String>();
```

のように書いていた部分が、

```Java
List<String> members = new ArrayList<>();
```

のように書けるようになりました。

### A.4.4 ループの書き方

**(p. 173)** Java 8で導入されたforEachとラムダ記法によって、ループを次のように書けるようになりました。（型を書かなくてよいので便利です。）

```Java
people.forEach((name) -> {
  System.out.println(name);
});
```

## A.5 クラス

### A.5.3 コレクションの活用

**(p. 182)**Java 8で導入されたラムダ記法によって、ソートは簡単に書けるようになりました。

```Java
Collections.sort(people, (Person a, Person b) -> a.getAge() - b.getAge());
```
