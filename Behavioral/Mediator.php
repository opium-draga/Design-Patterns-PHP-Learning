<?php


/**
 * Class AppDataLayer
 */
class DataLayer
{
    /**
     * @var DataComponent
     */
    protected $httpClient;
    /**
     * @var DataComponent
     */
    protected $emailClient;

    public function __construct(DataComponent $httClient, DataComponent $emailClient)
    {
        $this->httpClient = $httClient;
        $this->emailClient = $emailClient;

        $this->httpClient->setDataLayer($this);
        $this->emailClient->setDataLayer($this);
    }

    public function sendRequest($params)
    {
        return $this->httpClient->send($params);
    }

    public function createUser()
    {
        $result = $this->httpClient->send('v1/users/post/name=Yaroslav');
        if ($result === "JSON") {
            $this->emailClient->send("<h1>Eeeee man</h1>");
        }
    }
}

/**
 * Class DataComponent
 * Base class for Components
 */
abstract class DataComponent
{
    /**
     * @var DataLayer
     */
    protected $dataLayer;

    public function setDataLayer(DataLayer $dataLayer)
    {
        $this->dataLayer = $dataLayer;
    }

    public abstract function send($params);
}

/**
 * Class HttpClient
 * Concrete Component
 */
class HttpClient extends DataComponent
{
    public function send($params)
    {
        // make request to somewhere
        return "JSON_REST_API";
    }
}

/**
 * Class EmailClient
 * Concrete Component
 */
class EmailClient extends DataComponent
{
    private $serverLoging = true;

    public function send($params)
    {
        // send email to someone
        if ($this->serverLoging) {
            $this->dataLayer->sendRequest("/v1/log/email?params=".json_encode($params));
        }

        return "EMAIL_WAS_SEND";
    }
}

$emailClient = new EmailClient();

$dataLayer = new DataLayer(new HttpClient(), $emailClient);
$dataLayer->createUser();

$emailClient->send("User created, SERVER LOGS");
