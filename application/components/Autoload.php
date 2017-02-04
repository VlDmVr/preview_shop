<?php


function __autoload($class)
{
    $classes_path = include ROOT.'/config/classes_path.php';

    foreach($classes_path as $path)
    {
        $one_class_path = ROOT.'/application/'.$path.'/'.$class.'.php';

        if(file_exists($one_class_path))
        {
            include $one_class_path;
            break;
        }
    }
}

