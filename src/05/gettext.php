<?php
//UTF-8のテキストとしてウェブブラウザで表示する
header('Content-Type: text/plain; charset=utf-8');
 
//HTTP_Requestについての警告を抑制する
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);

//HTTPリクエスト
require_once('HTTP/Request.php');
$http_request = new HTTP_Request();
 
// プロキシサーバの設定
//$http_request->setProxy('proxy.example.net', 3128);
 
// HTTPリクエスト
$http_request->setUrl('http://www.unfindable.net/index.html');
$http_request->sendRequest();
 
// ステータスコード
printf("%d %s\n", $http_request->getResponseCode(),
        $http_request->getResponseReason());
 
// レスポンスボディの表示
echo $http_request->getResponseBody();