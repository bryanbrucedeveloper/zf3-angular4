<?php

namespace App\Action\ActionFactory;

use Interop\Container\ContainerInterface;
use App\Action\ActionCommon\ActInterface;

class ActFactory
{
    public function __invoke(ContainerInterface $container, string $next):ActInterface
    {        
        $action=new $next();
        $action->setContainer($container);
        return $action;
    }
}
