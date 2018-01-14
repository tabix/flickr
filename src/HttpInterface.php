<?php
namespace Tabix\Flickr;

interface HttpInterface
{
    public function send($url, $method, array $body, array $headers = [], $timeout = 60);
}
