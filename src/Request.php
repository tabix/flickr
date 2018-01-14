<?php
namespace Tabix\Flickr;

/**
 * 
 * @author Sebastian Arczewski <s.arczewski@gmail.com>
 * @date 2018-01-13
 */
class Request
{
    /**
     * @var array
     */
    private $__properties = [
        'api_key' => null,
        'method' => null,
        'format' => 'php_serial'
    ];

    /**
     * @var string
     */
    private $__method = 'GET';

    /**
     * 
     * @param array $data
     */
    public function __construct(array $data = [])
    {
        $this->__properties = $data + $this->__properties;
    }

    /**
     * @return string
     */
    public function getRequestMethod()
    {
        return $this->__method;
    }

    /**
     * @param string $method GET or POST
     * @throws \Tabix\Flickr\Exception
     */
    public function setRequestMethod($method)
    {
        $m = strtoupper($method);
        if ($m == 'GET' || $m == 'POST')
            $this->__method = $m;
        else
            throw new Exception("Unsupported request method '{$method}'! Only GET and POST are supported.");
    }

    /**
     * @param string $prop
     * @return bool
     */
    public function exists($prop)
    {
        return array_key_exists($prop, $this->__properties);
    }

    /**
     * @param string $name
     * @param mixed $value
     */
    public function __set($name, $value)
    {
        $this->__properties[$name] = $value;
    }

    /**
     * @param string $name
     * @return mixed
     */
    public function __get($name)
    {
        if ($this->exists($name))
        {
            return $this->__properties[$name];
        }
        else
        {
            throw new Exception("Property '{$name}' not exists!");
        }
    }
}
