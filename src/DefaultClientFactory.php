<?php
namespace Tabix\Flickr;

class DefaultClientFactory implements ClientFactory
{
    private function __createRestClient()
    {
        $transport = null;

        if (\extension_loaded('curl')) {
            $transport = new HttpCurl();
        } else {
            $transport = new HttpStream();
        }

        return new RESTClient($transport);
    }

    public function createClient($type)
    {
        switch(strtoupper($type)) {
            case self::TYPE_REST:
                return $this->__createRestClient();

            case self::TYPE_SOAP:
            case self::TYPE_RPC:
            default:
                throw new Exception("Type '{$type}' is not supported yet, sorry");
        }
    }
}
