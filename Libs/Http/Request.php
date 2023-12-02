<?php

namespace Libs\Http;
use Libs\Http\Interface\RequestInterface;



/**
 * stock la requete client
 */
class Request implements RequestInterface
{
    static Request $instance;

    /**
     * methode http exemple: get,post etc.........
     *
     * @var string
     */
    protected string $method;
    /**
     * requete ex: /api/utilisateurs
     *
     * @var string
     */
    protected string $uri;
    /**
     * les $_GET
     *
     * @var array
     */
    protected array $get;

    /**
     * les $_POST
     *
     * @var array
     */
    protected array $post;

    /**
     * instancie un objet requete
     *
     * @param $method //method hhtp
     * @param array $get $_GET
     * @param array $post $_POST
     * @param string $uri 
     */
    public function __construct(
        string $uri,
        $method = 'GET',
        array $get = [],
        array $post = [],

    ) {
        $this->uri = $uri;
        $this->method = $method;
        $this->get = $get;
        $this->post = $post;

    }

    public static function fromGlobals()
    {
        $uri = $_SERVER['REQUEST_URI'];
        $method = $_SERVER['REQUEST_METHOD'];
        $get = $_GET;
        $post = $_POST;

        self::$instance = new self($uri, $method, $get, $post);

        return self::$instance;
    }


	/**
	 * methode http exemple: get,post etc.........
	 * 
	 * @return string
	 */
	public function getMethod(): string {
		return $this->method;
	}

	/**
	 * requete ex: /api/utilisateurs
	 * 
	 * @return string
	 */
	public function getUri(): string {
		return $this->uri;
	}
}