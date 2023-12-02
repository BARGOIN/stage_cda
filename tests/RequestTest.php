<?php
use PHPUnit\Framework\TestCase;
use Libs\Http\Request;

class RequestTest extends TestCase
{
    public function testGetMethod()
    {
        // Crée une instance de la classe Request avec la méthode GET
        $request = new Request('/example', 'GET');
        
        // Vérifie que la méthode getMethod() renvoie 'GET'
        $this->assertEquals('GET', $request->getMethod());
    }

    public function testGetUri()
    {
        // Crée une instance de la classe Request avec l'URI '/example'
        $request = new Request('/example', 'GET');
        
        // Vérifie que la méthode getUri() renvoie '/example'
        $this->assertEquals('/example', $request->getUri());
    }

    // public function testFromGlobals()
    // {
    //     // Vous pouvez utiliser un outil de double pour simuler les superglobales $_SERVER, $_GET et $_POST.
    //     $server = [
    //         'REQUEST_URI' => '/example',
    //         'REQUEST_METHOD' => 'POST', // Méthode POST pour le test
    //     ];

    //     $get = ['param1' => 'value1', 'param2' => 'value2'];
    //     $post = ['field1' => 'data1', 'field2' => 'data2'];

    //     // Crée une instance de la classe Request en utilisant la méthode statique fromGlobals()
    //     $request = Request::fromGlobals();

    //     // Vérifie que les valeurs renvoyées correspondent aux superglobales simulées
    //     $this->assertEquals('/example', $request->getUri());
    //     $this->assertEquals('POST', $request->getMethod());
    //     $this->assertEquals($get, $request->getGet());
    //     $this->assertEquals($post, $request->getPost());
    // }
}
