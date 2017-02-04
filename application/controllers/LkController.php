<?php

class LkController extends App
{
    protected $defoultLayout = 'lk';
    
    public function __construct()
    {
        if($_SESSION['userID'])
         {
             header('Location: /cabinet');
         }
    }
}
