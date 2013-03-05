<?php

require_once 'OAuth.php';

class MyStream {

  private $consumerKey = 'Consumer Key';
  private $consumerSecret = 'Consumer Secret';
  private $accessToken = 'Access Token';
  private $accessTokenSecret = 'Access Token Secret';
  private $api = 'https://stream.twitter.com/1.1/statuses/sample.json';
  private $stream;

  public function __construct() {
    $consumer = new OAuthConsumer($this->consumerKey, $this->consumerSecret);
    $token = new OAuthConsumer($this->accessToken, $this->accessTokenSecret);
    $request = OAuthRequest::from_consumer_and_token($consumer, $token, 'GET', $this->api);
    $request->sign_request(new OAuthSignatureMethod_HMAC_SHA1(), $consumer, $token);
    //stream_context_set_default(array('http' => array('proxy' => "tcp://proxy.example.net:3128")));
    $this->stream = fopen($request->to_url(), 'r') or die();
  }

  public function getStream() {
    return $this->stream;
  }

}
