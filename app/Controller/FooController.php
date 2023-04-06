<?php

namespace App\Controller;

use Nyholm\Psr7\Response;

class FooController
{
    public function index(): Response
    {
        return new Response(200, [], 'foo');
    }

    public function store(): Response
    {
        return new Response(200, [], 'foo post');
    }
}
