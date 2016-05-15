<?php
header('Content-Type: text/plain; charset=utf-8');

error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE); //for HTTP_Request
require_once 'HTTP/Request.php';
$http_request = new HTTP_Request();
$http_request->setUrl('http://localhost/phpweb/home_timeline.json.php');
$http_request->sendRequest();
printf("%d %s\n", $http_request->getREsponseCode(),
        $http_request->getResponseReason());
 
// レスポンスボディを配列に変換
$results = json_decode($http_request->getREsponseBody(), true);
//print_r($results); // 結果の確認（var_dump()を使っても良い）
 
foreach ($results as $status) { // 配列$jsonの要素を一つずつ処理する
  //printf("%s ", $status['id']);
  printf("%s\n", $status['text']);
}