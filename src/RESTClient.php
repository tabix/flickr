<?php
namespace Tabix\Flickr;

class RESTClient extends Client
{
    private $__transport;

    public function __construct(HttpInterface $transport, $endpointUrl = Client::URL_FLICKR)
    {
        parent::__construct($endpointUrl);
        $this->setTransport($transport);
    }

    /**
     * @return HttpInterface
     */
    public function getTransport()
    {
        return $this->__transport;
    }

    public function setTransport(HttpInterface $transport)
    {
        $this->__transport = $transport;
    }

    public function send(Request $request)
    {
        $url = $this->getEndpoint();
        $body = [];

        if ('GET' == $request->getRequestMethod()) {
            $url .= '?' . \http_build_query($request->asArray());
        } else {
            $body = $request->asArray();
        }

        return $this->getTransport()->send(
            $url,
            $request->getRequestMethod(),
            $body
        );
    }
}
