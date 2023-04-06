<?php

namespace App;

use Psr\Http\Message\ServerRequestInterface;
use Nyholm\Psr7\Response;
use App\Controller\RootController;
use App\Controller\FooController;

class Router
{
    private array $define;

    public function __construct(?array $define = null)
    {
        if (is_null($define)) {
            $define = [
                '/' => ['GET' => [RootController::class, 'index']],
                '/foo' => [
                    'GET' => [FooController::class, 'index'],
                    'POST' => [FooController::class, 'store'],
                ],
            ];
        }
        $this->define = $define;
    }

    public function dispatch(ServerRequestInterface $request): Response
    {
        $path = $request->getUri()->getPath();
        if (($def = $this->define[$path]) === null) {
            return new Response(404, [], '404 Not Found');
        }

        if (($def = $def[$request->getMethod()]) === null) {
            return new Response(404, [], '404 Not Found');
        }

        [$controller, $action] = $def;

        return (new $controller())->$action();
    }
}
