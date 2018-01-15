<?php
namespace Tabix\Flickr;

interface ClientFactory
{
    /**
     * @return Client
     */
    public function createClient();
}
