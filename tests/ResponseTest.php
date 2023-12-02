<?php
use PHPUnit\Framework\TestCase;
use Libs\Http\Response;

class ResponseTest extends TestCase
{
    public function testGetHeaders()
    {
        $response = new Response();
        $headers = ['Content-Type: text/html', 'Cache-Control: no-cache'];
        foreach ($headers as $header) {
            $response->addHeader($header);
        }
        $this->assertEquals($headers, $response->getHeaders());
    }

    public function testGetStatusCode()
    {
        $response = new Response(404);
        $this->assertEquals(404, $response->getStatusCode());
    }

    public function testGetBody()
    {
        $response = new Response(200, [], 'Hello, World!');
        $this->assertEquals('Hello, World!', $response->getBody());
    }

    public function testGetLocation()
    {
        $response = new Response();
        $response->setLocation('/redirect');
        $this->assertEquals('/redirect', $response->getLocation());
    }

    public function testAddHeader()
    {
        $response = new Response();
        $response->addHeader('Content-Type: application/json');
        $this->assertEquals(['Content-Type: application/json'], $response->getHeaders());
    }

    public function testSetStatusCode()
    {
        $response = new Response();
        $response->setStatusCode(500);
        $this->assertEquals(500, $response->getStatusCode());
    }

    public function testSetBody()
    {
        $response = new Response();
        $response->setBody('Custom body content');
        $this->assertEquals('Custom body content', $response->getBody());
    }

    public function testSetLocation()
    {
        $response = new Response();
        $response->setLocation('/new-location');
        $this->assertEquals('/new-location', $response->getLocation());
    }
}
