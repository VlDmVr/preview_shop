<?php

class Cart
{
    public static function addToCart($id, $quantity)
    {
        $cart_arr = array();
        
        if(!$_SESSION['cart'])
        {
            $cart_arr = array($id => $quantity);
            $_SESSION['cart'] = $cart_arr;
        }
        else
        {
            $cart_arr = $_SESSION['cart'];
            if(isset($cart_arr[$id]))
            {
                $cart_arr[$id] += $quantity;
            }
            else {
                $cart_arr[$id] = $quantity;
            }
            $_SESSION['cart'] = $cart_arr;
        }
        return $_SESSION['cart'];
    }
    
    public static function countProducts($session_cart_arr=array())
    {
        $all_arr_products = $session_cart_arr;
        
        if($all_arr_products)
        {
            
            foreach($all_arr_products as $product )
            {
                $cnt +=  $product;
            }
            
            $_SESSION['cnt'] = $cnt;
            
            return $_SESSION['cnt'];
        }
        else 
        {
            unset($_SESSION['cnt']);
            return 0;
        }
    }
    
    public static function getSelectProduct($products)
    {
        $status = 1;
       
        $pdo = Db::getConnection();
        
        foreach($products as $key_prod=>$vle_prod)
        {
            $sql = 'SELECT id, name, cat_id, price FROM autos WHERE status = :status AND id = :id';
            $result = $pdo->prepare($sql);
            $result->bindParam(':status', $status, PDO::PARAM_INT);
            $result->bindParam(':id', $key_prod, PDO::PARAM_INT);
            $result->execute();
            $row = $result->fetch(PDO::FETCH_ASSOC);
            $row['quantity'] = $vle_prod;
            $row['sum'] = (int)$row['price'] * (int)$row['quantity'];
            $cat_id = $row['cat_id'];
            $sql = 'SELECT name FROM category WHERE status = :status AND id = :id';
            $result2 = $pdo->prepare($sql);
            $result2->bindParam(':status', $status, PDO::PARAM_INT);
            $result2->bindParam(':id', $cat_id, PDO::PARAM_INT);
            $result2->execute();
            $row2 = $result2->fetch(PDO::FETCH_ASSOC);
            $row['producer'] = $row2['name'];
            $products_arr[] = $row;
        }
        
        return $products_arr;
    }
    
    public static function sum($products_arr)
    {
        foreach($products_arr as $product)
        {
            $all_sum += $product['sum'];
        }
        return $all_sum;
    }
    
    public static function save($order_name, $order_email, $order_adress, $order_phone, $cart)
    {
        $status = 1;
        
        $pdo = Db::getConnection();
        $sql = 'INSERT INTO user_orders (name, email, adress, phone, status, cart) VALUES (:name, :email, :adress, :phone, :status, :cart)';
        $result = $pdo->prepare($sql);
        $result->bindParam(':name', $order_name, PDO::PARAM_STR);
        $result->bindParam(':email', $order_email, PDO::PARAM_STR);
        $result->bindParam(':adress', $order_adress, PDO::PARAM_STR);
        $result->bindParam(':phone', $order_phone, PDO::PARAM_STR);
        $result->bindParam(':status', $status, PDO::PARAM_INT);
        $result->bindParam(':cart', $cart, PDO::PARAM_STR);
        return $result->execute();
    }
}

