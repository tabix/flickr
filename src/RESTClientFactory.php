<?php
namespace Tabix\Flickr;

class RESTClientFactory implements ClientFactory
{
    private $__url;

    public function __construct($url = Client::FLICKR_URL)
    {
        $this->__url = $url;
    }

    public function createClient()
    {
        $http = \extension_loaded('curl') ? new HttpCurl() : new HttpStream();
        return new RESTClient($http, $this->__url);
    }
}
