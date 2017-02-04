<?php

/* 
 * Файл обработчик ajax запроса из sliderWidget
 */

$images = scandir("./images/slider/");

array_shift($images);
array_shift($images);

if(!empty($images)){
    
    $data = json_encode($images);
    
    echo $data;
}
