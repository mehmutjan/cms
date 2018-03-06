<?php

namespace App\Controller\Web;

use Symfony\Component\HttpFoundation\Response;

class DefaultController
{
    public function index()
    {
        return new Response('hello');
    }
}
