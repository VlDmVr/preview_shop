<?php

class CartController extends Controller
{
    public function actionIndex()
    {
        if($_SESSION['cart'])
        {
           $products = $_SESSION['cart'];
           
            $products_arr = Cart::getSelectProduct($products);
            
            $all_sum = Cart::sum($products_arr);   
        }
        if($_POST['order_submit'])
        {
            $order_name = $_POST['order_name'];
            $order_email = $_POST['order_email'];
            $order_adress = $_POST['order_adress'];
            $order_phone = $_POST['order_phone'];
            $display = 'block';
           
            $errors = false;
            
            if(!User::checkName($order_name))
            {
                $errors[] = 'Имя должно быть больше 3 символов!';
            }
            if(!User::checkEmail($order_email))
            {
                $errors[] = 'Не корректный email!';
            }
            if(!User::checkAdress($order_adress))
            {
                $errors[] = 'Адрес должен быть больше 10 символов!';
            }
            if(!User::checkPhone($order_phone))
            {
                $errors[] = 'Телефон должен быть больше 11 символов!';
            }
            
            if(!$errors)
            {
                if(isset($_SESSION['cart']))
                {
                    $cart = json_encode($_SESSION['cart']);
                    
                    $result = Cart::save($order_name, $order_email, $order_adress, $order_phone, $cart);
                    if($result)
                    {
                        unset($_SESSION['cart']);
                        header('Location: /cart/send');
                    }
                }
            }
        }
        else 
        {
            $display = 'none';
        }
        
        $this->render('cart_view', array('products_arr'=>$products_arr, 
                                            'all_sum'=>$all_sum, 
                                            'order_name'=>$order_name, 
                                            'order_email'=>$order_email, 
                                            'order_adress'=>$order_adress, 
                                            'order_phone'=>$order_phone,
                                            'result'=>$result,
                                            'errors'=>$errors,
                                            'display'=>$display,
                                        ));
    }
    
    public function actionDelete()
    {
        unset($_SESSION['cart']);
        header('Location: /cart');
    }
    
    public function actionDelete_product($id)
    {
       if(isset($_SESSION['cart']))
       {
           $products = $_SESSION['cart'];
           foreach($products as $key=>$value)
           {
               if($key == $id)
               {
                   unset($products[$key]);
               }
           }
           $_SESSION['cart'] = $products;
       }
        header('Location: /cart');
    }
    
    public function actionSend()
    {
        $this->render('send_view');
    }
}

