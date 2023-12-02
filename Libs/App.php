<?php

namespace Libs;

use Libs\Http\Interface\RequestInterface;
use Libs\Http\Interface\ResponseInterface;
use Libs\Http\Response;
use Libs\Http\Request;
use Libs\Router\Router;


/**
 * 
 */
class App
{
    /**
     * prend l url et reponds
     *
     * @param Request $request
     * @return Response
     */
    public function run(RequestInterface $request): ResponseInterface
    {
        $uri = $request->getUri();
        // si tu as un / tu l ' enleve et redirection
        if (strlen($uri) > 1 && $uri[-1] === '/') {
            return (new Response)
                ->setStatusCode(301)
                ->setLocation(substr($uri, 0, -1));
        }


        $routeur = new Router($request);
        require '../App/routes.php';

        $match = $routeur->match();

        if ($match) {
            if (is_callable($match['action'])) {
                call_user_func($match['action']);
            }
        } else {
            return new Response(404, [], 'page erreur');
        }

        return new Response();
    }
}
