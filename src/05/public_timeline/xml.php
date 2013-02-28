<?php

//This script emulates https://dev.twitter.com/docs/api/1/get/statuses/public_timeline.xml.

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

error_reporting(E_ALL ^ E_STRICT); //for XML/Serializer
require_once 'XML/Serializer.php';
$result = '';
$i = 0;
while ($i < 20 && $json = fgets($stream)) {
  $status = json_decode($json, true, 512, JSON_BIGINT_AS_STRING);
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
