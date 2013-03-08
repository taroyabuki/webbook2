<?php

//This script emulates https://dev.twitter.com/docs/api/1/get/statuses/public_timeline.xml.

require_once 'MyStream.php';
$myStream = new MyStream();

error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE); //for XML_Serializer
require_once 'XML/Serializer.php';
$result = '';
$i = 0;
while ($i < 20 && $json = fgets($myStream->getStream())) {
  $status = json_decode($json, true);
  //$status = json_decode($json, true, 512, JSON_BIGINT_AS_STRING);
  if (isset($status['text'])) {
    $serializer = new XML_Serializer(array('rootName' => 'status'));
    $serializer->serialize($status);
    $result.=$serializer->getSerializedData();
    $i++;
  }
}

header("Content-Type:text/xml; charset=utf-8");
echo "<?xml version='1.0' encoding='UTF-8'?>\n";
echo "<statuses type='array'>$result</statuses>";
