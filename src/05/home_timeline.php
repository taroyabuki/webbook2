<?php
header('Content-Type: text/plain; charset=utf-8');

$json = file_get_contents('http://localhost/phpweb/home_timeline.json.php');
var_dump($http_response_header);
echo "\n";

// レスポンスボディを配列に変換
$results = json_decode($json, true);
//print_r($results); // 結果の確認（var_dump()を使っても良い）

foreach ($results as $status) { // 配列$jsonの要素を一つずつ処理する
  //printf("%s ", $status['id']);
  printf("%s\n", $status['text']);
}