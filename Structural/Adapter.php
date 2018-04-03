<?php

/**
 * Class Message
 * Base interface
 */
class Message
{
    public function send()
    {
        echo "Hello";
    }
}


/**
 * Class Http
 * Adaptee
 */
class Http
{
    public function sendHttpRequest($message)
    {
        // send request via HTTP
    }
}

/**
 * Class HttpMessage
 * Adapter
 */
class HttpMessage extends Message
{
    public function send()
    {
        $httpSender = new Http();
        $httpSender->sendHttpRequest("world");
    }
}

class HttpMessage2 extends Message
{
    /**
     * @var Http
     */
    public $httpSender;

    public function __construct($httpSender)
    {
        $this->httpSender = $httpSender;
    }

    public function send()
    {
        $this->httpSender->sendHttpRequest("Hello world");
    }
}

/**
 * First variant
 */
$messager = new HttpMessage();
$messager->send();

/**
 * Second variant
 * This one more flexible
 */
$httpClient = new Http();
$messager2 = new HttpMessage2($httpClient);
$messager2->send();