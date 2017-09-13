<?php

namespace App\Action\ActionCommon;

use Zend\Expressive\Router\RouterInterface;
use Zend\Diactoros\Response\{JsonResponse};
use Interop\Container\ContainerInterface;
use Psr\Http\Message\{ResponseInterface as Response};
use App\Factory\{CDI,InjectInterface};

abstract class ActAbstract{
    
    private $container;
    private $router=null;
    
    public function setContainer(ContainerInterface $container):void{
        $this->container=$container;
    }
    public function getRoute():RouterInterface{
        if(is_null($this->router))
        $this->router=$this->container->get(RouterInterface::class);
        return $this->router;
    }
    
    public function JsonResponse(array $data,int $code=200):Response{
        return new JsonResponse($data,$code);
    }
    
    public function inject(string $class):InjectInterface{
        return CDI::inject($class);
    }
}