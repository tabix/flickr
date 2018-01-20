<?php
namespace Tabix\Flickr;

/**
 * @author Sebastian Arczewski <s.arczewski@gmail.com>
 */
class Flickr
{
    /**
     * @var Client
     */
    private $__client;

    /**
     * @var string
     */
    private $__defaultApiKey;

    /**
     * @var string
     */
    private $__defaultResponseFormat = 'php_serial';

    /**
     * @param string $apiKey
     * @param Client $client
     */
    public function __construct($apiKey, $clientType = ClientFactory::TYPE_REST, ClientFactory $cf = null)
    {
        if (null == $cf) {
            $cf = new DefaultClientFactory();
        }

        $this->setDefaultApiKey($apiKey);
        $this->setClient($cf->createClient($clientType));
    }

    public function getClient()
    {
        return $this->__client;
    }

    public function setClient(Client $client)
    {
        $this->__client = $client;
        return $this;
    }

    public function getDefaultApiKey()
    {
        return $this->__defaultApiKey;
    }

    public function setDefaultApiKey($key)
    {
        $this->__defaultApiKey = $key;
        return $this;
    }

    public function getDefaultResponseFormat()
    {
        return $this->__defaultResponseFormat;
    }

    public function setDefaultResponseFormat($format)
    {
        $this->__defaultResponseFormat = $format;
        return $this;
    }

    /**
     * @param Request $request
     * @param Client $client
     * @return mixed
     */
    public function send(Request $request, Client $client = null)
    {
        if (null == $client) {
            $client = $this->getClient();
        }

        $r = clone $request;

        if (null == $r->api_key) {
            $r->api_key = $this->getDefaultApiKey();
        }

        if (null == $r->format) {
            $r->format = $this->getDefaultResponseFormat();
        }

        return $client->send($r);
    }

    /**
     * 
     * @return Request
     */
    public function request($method, array $params)
    {
        $params['method'] = $method;
        return new Request($params);
    }
    
    /**
     * 
     * @return mixed
     */
    public function requestSend($method, array $params, Client $client = null)
    {
        return $this->send($this->request($method, $params), $client);
    }
}
