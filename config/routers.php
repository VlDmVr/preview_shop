<?php

return array(
    'auto/([0-9]+)'=>'auto/index/$1',
    
    'autos/([a-z]+)'=>'autos/index/$1',
    
    'user/good_reg'=>'user/good_reg',
    'user/registration'=>'user/registration',
    'user/auth'=>'user/auth',
    'user/exit'=>'user/exit',
    
    'cabinet/edit'=>'cabinet/edit',
    'cabinet'=>'cabinet/index',
    
    'cart/delete_product/([0-9]+)'=>'cart/delete_product/$1',
    'cart/delete'=>'cart/delete',
    'cart/order'=>'cart/order',
    'cart/send'=>'cart/send',
    'cart'=>'cart/index',
    
    'admin/create'=>'admin/create',
    'admin/update_product'=>'admin/update_product',
    'admin/delete_product'=>'admin/delete_product',
    'admin/delete_category'=>'admin/delete_category',
    'admin/products/([0-9]+)'=>'admin/products/$1',
    'admin/products'=>'admin/products',
    'admin/categories'=>'admin/categories',
    'admin/users'=>'admin/users',
    'admin'=>'admin/index',
    
    'error/error'=>'error/error',
    
    /*
    'products/([a-z]+)/([0-9]+)'=>'products/view/$1/$2',
    'products'=>'products/index',
    */
);

