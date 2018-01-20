<?php
namespace Tabix\Flickr;
// php 5.5.0 ?
class HttpCurl implements HttpInterface
{
    private $__curl;

    public function __construct()
    {
        if (!\extension_loaded('curl')) {
            throw new Exception('curl extension is not loaded!');
        }
    }

    public function __destruct()
    {
        $this->close();
    }

    public function init()
    {
        if (!is_resource($this->__curl)) {
            return $this->__curl = \curl_init();
        } else {
            throw new Exception('HttpCurl is initialized!');
        }
    }

    public function close() {
        if (is_resource($this->__curl)) {
            \curl_close($this->__curl);
        }
    }

    /**
     * 
     * @return mixed
     * @throws \Tabix\Flickr\HttpException
     */
    public function send($url, $method = 'GET', array $body = [], array $headers = [], $timeout = 30)
    {
        $curl = $this->init();

        $options = [
            CURLOPT_URL => $url,
            CURLOPT_CUSTOMREQUEST => $method,
            CURLOPT_HTTPHEADER => $this->__processHeaders($headers),
            CURLOPT_TIMEOUT => $timeout,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_USERAGENT => 'Tabix\Flickr\HttpCurl'
        ];

        if ('GET' !== $method) {
            $options[CURLOPT_POSTFIELDS] = $body;
        }

        if (\curl_setopt_array($curl, $options)) {
            $result = \curl_exec($curl);

            if (false !== $result) {
                $this->close();
                return $result;
            } else {
                $error = \curl_error($curl);
                $this->close();
                throw new HttpException($error);
            }
        } else {
            $code = \curl_errno($curl);
            $error = \curl_error($curl);
            $this->close();
            throw new HttpException($error, $code);
        }
    }

    private function __processHeaders(array $headers)
    {
        $return = [];
        foreach($headers as $key => $value) {
            $return[] = trim($key) . ': ' . $value;
        }
        return $return;
    }
}
