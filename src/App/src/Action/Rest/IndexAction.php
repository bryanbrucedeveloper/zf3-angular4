<?php

namespace App\Action\Rest;

use Psr\Http\Message\{ResponseInterface as Response, ServerRequestInterface as Request};
use App\Action\ActionCommon\{DispatchTrait, ActInterface, ActAbstract};

class IndexAction extends ActAbstract implements ActInterface
{
    use DispatchTrait;        
  
    public function indexAction(Request $request, Response $response, callable $next = null):Response{        
       return $this->JsonResponse(['result'=>'success!!!']);
    }

    public function guardarAction(Request $request, Response $response, callable $next = null):Response{        
        return $this->JsonResponse(['result'=>'Guardar datos']);
    }  
    
    public function eliminarAction(Request $request, Response $response, callable $next = null):Response{        
        return $this->JsonResponse(['result'=>'Eliminar datos']);
    }  
    
    public function actualizarAction(Request $request, Response $response, callable $next = null):Response{        
        return $this->JsonResponse(['result'=>'Actualizar datos']);
    }      
}