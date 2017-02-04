<?php


class SliderWidget extends Widget{
    
    public static function setVisible($param){
        
        self::$visible = $param;
        
        return;
    }
    
     public static function getVisible(){
         
         return self::$visible;
        
    }
}
