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
}