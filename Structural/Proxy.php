<?php

/**
 * Class Page
 * Proxy Client
 */
class Page
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function getProduct($id)
    {
        $this->request->httpGet("url.com?id={$id}");
    }
}

/**
 * Interface Request
 * Generic interface for Concrete class and Proxy
 */
interface Request
{
    public function httpGet($url);
}

/**
 * Class RequestHttp
 * Concrete Class
 */
class HttpRequest implements Request
{
    public function httpGet($url)
    {
        echo "Request to {$url}";
    }
}

/**
 * Class RequestLogger
 * Proxy with possibility to add logger
 */
class AdvancedRequest implements Request
{
    public $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function httpGet($url)
    {
        $this->log($url);
        $this->request->httpGet($url);
    }

    private function log($url, $writeToFile = false)
    {
        echo "Logger: Request to {$url}";

        if ($writeToFile) {
          // write to file
        }
    }
}

$httpClient = new HttpRequest();
$httpWithLogger = new AdvancedRequest($httpClient);

$page = new Page($httpWithLogger);
$page->getProduct(123);