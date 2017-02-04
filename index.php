<?php
    session_start();
    error_reporting(E_ALL & ~E_NOTICE);
    
    //определение путей
    define('ROOT', dirname(__FILE__));
    define('SYSTEM', dirname(__FILE__).'/system/');
   
    //подключение файлов компонентов
    include ROOT.'/application/components/Autoload.php';
    include ROOT.'/application/components/Router.php';
    
     //подключение системных файлов
    $system = scandir(SYSTEM);
    array_shift($system);
    array_shift($system);
    foreach($system as $system_path)
    {
        if($system_path)
        {
            include SYSTEM.$system_path;
        }
    }
    
    $obj = new Router;
    $obj->run();
?>