<?php

namespace App\Action\ActionCommon;

use Psr\Http\Message\{ResponseInterface as Response, ServerRequestInterface as Request};

interface ActInterface{

    public function __invoke(Request $request, Response $response, callable $next = null):Response;  
      
    public function indexAction(Request $request, Response $response, callable $next = null):Response;
}