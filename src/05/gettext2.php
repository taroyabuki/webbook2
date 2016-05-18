<?php
//UTF-8のテキストとしてウェブブラウザで表示する
header('Content-Type: text/plain; charset=utf-8');

// HTTPリクエスト（proxy未対応）
$result = file_get_contents('http://www.unfindable.net/index.html');
var_dump($http_response_header);
echo "\n";

// レスポンスボディの表示
echo $result;