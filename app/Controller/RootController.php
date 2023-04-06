<?php

namespace App\Controller;

use Nyholm\Psr7\Response;

class RootController
{
    public function index(): Response
    {
        $body = file_get_contents(__DIR__.'/../views/root/index.html');

        return new Response(200, ['Content-Type' => 'text/html'], $body);
    }

}
