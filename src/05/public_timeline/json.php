<?php
//This script emulates https://dev.twitter.com/docs/api/1/get/statuses/public_timeline.json.
//Options except callback are not supported.

require_once 'MyStream.php';
$myStream = new MyStream();

$result = '[';
$i = 0;
while ($i < 20 && $json = fgets($myStream->getStream())) {
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
