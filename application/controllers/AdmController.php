<?php

class AdmController extends App
{
 
    protected $defoultLayout = 'admin';
     
    public function __construct()
    {
        if($_SESSION['role'] != 'admin')
        {
            header('Location: /');
        }

    }
}