<?php

class Router
{
    private $routers;
    private $defoultController = 'site';
    private $defoultAction = 'index';
    
    public static $folder_view;

    
    public function __construct()
    {
        $this->routers = $_SERVER['REQUEST_URI'];
    }
    
    public function run()
    {
        
        $request_path = trim($this->routers, '/');
        $routers_file = include ROOT.'/config/routers.php';
        
        if(!$request_path)
        {
              $controller = ucfirst($this->defoultController).'Controller';
              $action = 'action'.ucfirst($this->defoultAction);
              self::$folder_view = $this->defoultController;
        }
        else
        {
          foreach($routers_file as $key_routers_path=>$vle_routers_path)
            {
                if(preg_match("~$key_routers_path~", $request_path))
                {
                    $internal_path = preg_replace("~$key_routers_path~", $vle_routers_path, $request_path);
                    

                    $segments = explode('/', $internal_path);

                    self::$folder_view = array_shift($segments);
                    $controller = ucfirst(self::$folder_view).'Controller';
                    $action = 'action'.ucfirst(array_shift($segments));
                    
                    if(!$action)
                    {
                        $action = $this->defoultAction;
                    }

                    $parameters = $segments;
                    break;
                }
                else
                {
                    $controller = 'ErrorController';
                    $action = 'actionError';
                    self::$folder_view = 'error';
                }
            }
        }
       
        $obj = new $controller;
        
        if($parameters){
            call_user_func_array(array($obj, $action), $parameters);
        }
        else 
        {
            $obj->$action();
        }
    }
}

