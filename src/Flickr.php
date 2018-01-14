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

    private $__defaultApiKey = null;

    private $__defaultResponseFormat = 'php_serial';

    /**
     * @param Client $client
     */
    public function __construct($api_key)
    {
        $this->setDefaultApiKey($api_key);
    }

    public function getClient()
    {
        return $this->__client;
    }

    public function setClient(Client $client)
    {
        $this->__client = $client;
    }

    public function getDefaultApiKey()
    {
        return $this->__defaultApiKey;
    }

    public function setDefaultApiKey($key)
    {
        $this->__defaultApiKey = $key;
    }

    public function getDefaultResponseFormat()
    {
        return $this->__defaultResponseFormat;
    }

    public function setDefaultResponseFormat($format)
    {
        $this->__defaultResponseFormat = $format;
    }

    /**
     * @param Request $request
     * @param Client $client
     * @return mixed
     */
    public function send(Request $request, Client $client = null)
    {
        if (null == $client) {
            $client = $this->__client;
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
}
