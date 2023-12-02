<?php

namespace Libs\Router;

use Libs\Http\Interface\RequestInterface;


class Router
{
    /**
     * liste des routes
     *
     * @var array
     */
    protected array $routes;


    /**
     * la requete
     *
     * @var RequestInterface
     */
    protected RequestInterface $request;

    /**
     * instancie un objet routeur
     *
     * @param RequestInterface $resquest
     */
    public function __construct(RequestInterface $resquest)
    {
        $this->routes = [];
        $this->request = $resquest;

    }


    /**
     * ajoute une route
     *
     * @param string $method method http (GET,POST)
     * @param string $path uri attendue
     * @param callable $action fonction a executer
     * @return void
     */
    public function addRoute(string $method, string $path, callable $action)
    {
        $this->routes[] = [
            'method' => $method,
            'path' => $path,
            'action' => $action,
        ];
    }
    /**
     * retourne la route correspondante a la requete actuelle
     *
     * @return array|false
     */
    public function match(): array|false
    {
        foreach ($this->routes as $key => $route) {
            if (
                $route['path'] === $this->request->getUri() &&
                $route['method'] === $this->request->getMethod()
            ) {
                return $route;
            }

        }
        return false;
    }


}