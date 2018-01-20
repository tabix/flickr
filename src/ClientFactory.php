<?php
namespace Tabix\Flickr;

interface ClientFactory
{
    const TYPE_REST = 'REST';
    const TYPE_SOAP = 'SOAP';
    const TYPE_RPC  = 'RPC';

    /**
     * 
     * @param string $type
     * 
     * @return Client
     */
    public function createClient($type);
}
