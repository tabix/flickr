<?php

use PHPUnit\Framework\TestCase;
use Tabix\Flickr\Request;

class RequestTest extends TestCase
{
    private $request;

    public function setUp()
    {
        $this->request = new Request();
    }

    public function testExistsDefaultValues()
    {
        $this->assertTrue($this->request->exists('api_key'));
        $this->assertTrue($this->request->exists('method'));
        $this->assertTrue($this->request->exists('format'));
    }

    public function testMagicGet()
    {
        $this->assertEquals(null, $this->request->api_key);
        $this->assertEquals(null, $this->request->method);
        $this->assertEquals('php_serial', $this->request->format);
    }

    public function testMagicSet()
    {
        $this->request->test = 123;
        $this->assertEquals(123, $this->request->test);
    }

    public function testConstructor()
    {
        $request = new Request([
            'api_key' => 0x29a,
            'test' => '0x29a'
        ]);

        $this->assertEquals(666, $request->api_key);
        $this->assertEquals('0x29a', $request->test);
    }

    /**
     * @expectedException \Tabix\Flickr\Exception
     */
    public function testNotExistingProperty()
    {
        $this->request->not_existing;
    }

    public function testGetRequestMethod()
    {
        $this->assertEquals('GET', $this->request->getRequestMethod());
    }

    public function testSetRequestMethod()
    {
        $this->request->setRequestMethod('post');
        $this->assertEquals('POST', $this->request->getRequestMethod());
    }

    /**
     * @expectedException \Tabix\Flickr\Exception
     */
    public function testBadRequestMethod()
    {
        $this->request->setRequestMethod('put');
    }
}
