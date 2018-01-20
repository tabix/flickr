<?php
namespace Tabix\Flickr;

/**
 * 
 * @author Sebastian Arczewski <s.arczewski@gmail.com>
 */
interface HttpInterface
{
    /**
     * @return mixed
     */
    public function send($url, $method, array $body = [], array $headers = [], $timeout = 60);
}
