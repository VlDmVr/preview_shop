<?php

class App
{
    
    public static function getUserRole()
    {
        if($_SESSION['role'] != 'admin')
        {
            $display = 'none';
        }
        return $display;
    }
    
    public function render($view=null, $data=array())
    {
        $content = $this->renderPartial($view, $data, $fl=true);
        $layout = ROOT.'/application/views/layouts/'.$this->defoultLayout.'.php';
        include $layout;
    }
    
    public function renderPartial($view=null, $data=array(), $fl=false)
    {
        if($data)
        {
            extract($data);
        }
        if($view)
        {
            $partial_view = ROOT.'/application/views/'.Router::$folder_view.'/'.$view.'.php';
            
            if($fl)
            {
                ob_start();
                include $partial_view;
                return ob_get_clean();
            }
            else 
            {
                include $partial_view;
            }
        }
    }
}

