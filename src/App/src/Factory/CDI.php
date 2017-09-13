<?php

namespace App\Factory;

use App\Factory\InjectInterface; 

class CDI{

    private static $instance=null;
    
    public function getInstance():CDI{
        if(is_null(self::$instance))
            self::$instance=new CDI();
        return self::$instance;
    }
    
    public static function inject(string $class):InjectInterface{
        $interfaces=class_implements($class);       
        $oReturn=null;
        $existInject=false;
        foreach($interfaces as $interface){           
            //Service
            if($interface === 'App\Service\Common\ServiceInterface'){     
                $oReturnString=str_replace('App\Service','App\Service\Implement',$class).'Impl';
                $oReturn=new $oReturnString();              
                $existInject=true;
                break;
            }
            //Repository   
            if($interface === 'App\Repository\Common\RepositoryInterface'){
                $oReturnString=str_replace('App\Repository','App\Repository\Implement',$class).'Impl';
                $oReturn=new $oReturnString();
                $existInject=true;
                break;
            }            
        }        
        if($existInject===true){           
            return $oReturn;
        }else{
            return new $class();
        }
    }    
}