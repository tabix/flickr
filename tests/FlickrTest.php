<?php

use PHPUnit\Framework\TestCase;
use Tabix\Flickr\Flickr;

class FlickrTest extends TestCase
{
    private $flickr;

    public function setUp()
    {
        $this->flickr = new Flickr('666');
    }

    public function testGetDefaultApiKey()
    {
        $this->assertEquals('666', $this->flickr->getDefaultApiKey());
    }

    public function testSetDefaultApiKey()
    {
        $this->flickr->setDefaultApiKey('flickr');
        $this->assertEquals('flickr', $this->flickr->getDefaultApiKey());
    }

    public function testGetClient()
    {
        $expected = \Tabix\Flickr\HttpCurl::class;

        if (!extension_loaded('curl')) {
            $expected = \Tabix\Flickr\HttpStream::class;
        }

        $this->assertInstance($expected, $this->flickr->getClient());
    }

    public function testSetClient()
    {

    }

    public function testGetDefaultResponseFormat()
    {
        $this->assertEquals('php_serial', $this->flickr->getDefaultResponseFormat());
    }

    public function testSetDefaultResponseFormat()
    {
        $this->flickr->setDefaultResponseFormat('json');
        $this->assertEquals('json', $this->flickr->getDefaultResponseFormat());
    }

    public function testRequest()
    {
        $expected = new Request('flickr.photos.getInfo', ['photo_id' => '251875545']);
        $this->assertEquals($expected, $this->flickr->request('flickr.photos.getInfo', ['photo_id' => '251875545']));
    }

    public function testSend()
    {

    }

    public function testRequestSend()
    {
        
    }
}
