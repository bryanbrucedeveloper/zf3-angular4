<?php

namespace App\Action\ActionCommon;

use Psr\Http\Message\{ResponseInterface as Response, ServerRequestInterface as Request};
use Zend\Expressive\Router\RouteResult;

trait DispatchTrait{

    public function __invoke(Request $request, Response $response, callable $next = null):Response
    {   
        $route = $request->getAttribute(RouteResult::class, false)->getMatchedRoute();        
        $callMethod=$route->getOptions()['callMethod'].'Action';        
        if (method_exists($this, $callMethod)) 
            return $this->$callMethod($request,$response,$next);

        return $response->withStatus(501);
    }
}