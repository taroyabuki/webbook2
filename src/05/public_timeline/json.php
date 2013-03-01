<?php
//This script emulates https://dev.twitter.com/docs/api/1/get/statuses/public_timeline.json.
//Options except callback are not supported.

require_once 'OAuth.php';
$api = 'https://stream.twitter.com/1.1/statuses/sample.json';
$consumer = new OAuthConsumer(
        '***** Consumer key *****',
        '***** Consumer secret *****');
$token = new OAuthConsumer(
        '***** Consumer secret *****',
        '***** Token secret *****');
$request = OAuthRequest::from_consumer_and_token($consumer, $token, 'GET', $api);
$request->sign_request(new OAuthSignatureMethod_HMAC_SHA1(), $consumer, $token);

//stream_context_set_default(array('http' => array('proxy' => "tcp://proxy.example.net:3128")));
$stream = fopen($request->to_url(), 'r') or die();

$result = '[';
$i = 0;
while ($i < 20 && $json = fgets($stream)) {
  $status = json_decode($json, true);
  if (isset($status['text'])) {
    $result.="$json,";
    $i++;
  }
}
$result = rtrim($result, ",") . ']';

if (isset($_GET['callback'])) {
  header("Content-Type:application/javascript; charset=utf-8");
  printf("%s(%s)", htmlspecialchars($_GET['callback'], ENT_QUOTES, 'UTF-8'), $result);
} else {
  header("Content-Type:application/json; charset=utf-8");
  echo $result;
}
