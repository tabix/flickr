<?php
namespace Tabix\Flickr;

class RESTClient implements Client
{
    private $__http;

    public function __construct(HttpInterface $http)
    {
        $this->__http = $http;
    }

    public function send(Request $request)
    {

    }
}
