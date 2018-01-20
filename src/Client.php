<?php
namespace Tabix\Flickr;

/**
 * @author Sebastian Arczewski <s.arczewski@gmail.com>
 */
abstract class Client
{
    const URL_FLICKR = 'https://api.flickr.com/';

    private $__endpoint;

    public function __construct($url)
    {
        $this->setEndpoint($url);
    }

    public function getEndpoint()
    {
        return $this->__endpoint;
    }

    public function setEndpoint($url)
    {
        $this->__endpoint = $url;
        return $this;
    }

    /**
     * @param Request $request
     * @return string
     */
    abstract public function send(Request $request);
}
