<?php

class User
{
    
    public static function checkName($name)
    {
        if(strlen($name) >= 3)
        {
            return true;
        }
        return false;
    }
    
    public static function checkPassword($password)
    {
        if(strlen($password) >= 5)
        {
            return true;
        }
        return false;
    }
    
     public static function checkEmail($email)
    {
        if(filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            return true;
        }
        return false;
    }
    
    public static function checkAdress($order_adress)
    {
        if(strlen($order_adress) >= 10)
        {
            return true;
        }
        return false;
    }
    
    public static function checkPhone($order_phone)
    {
        if(strlen($order_phone) >= 11)
        {
            return true;
        }
        return false;
    }
    
    public static function checkEmailExists($email)
    {
        $pdo = Db::getConnection();
        $sql = 'SELECT COUNT(*) FROM users WHERE email = :email';
        $result = $pdo->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->execute();
        
        if($result->fetchColumn())
        {
            return true;
        }
        return false;
    }
    
    public static function register($name, $email, $password, $ban, $date, $role)
    {
        $password = self::hashPassword($password);
        
        $pdo = Db::getConnection();
        $sql = 'INSERT INTO users (name, email, password, ban, date, role) VALUES (:name, :email, :password, :ban, :date, :role)';
        $result = $pdo->prepare($sql);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);
        $result->bindParam(':ban', $ban, PDO::PARAM_INT);
        $result->bindParam(':date', $date, PDO::PARAM_STR);
        $result->bindParam(':role', $role, PDO::PARAM_STR);
        return $result->execute();
    }
    
    public static function hashPassword($password)
    {
        return md5('fjojap&()=fgh'.$password);
    }
    
    public static function checkUserAuth($email, $password)
    {
        $password = self::hashPassword($password);
        
        $pdo = Db::getConnection();
        $sql = 'SELECT id, email, password, role FROM users WHERE email = :email AND password = :password';
        $result = $pdo->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);
        $result->execute();
        
        return $result->fetch();
    }
    
    public static function addRoleSession($user)
    {
        return $_SESSION['role'] = $user['role'];
    }   
   
    public static function addUserSession($email, $password)
    {
        $user = self::checkUserAuth($email, $password);
        
        if($user)
        {
            self::addRoleSession($user);
            return $_SESSION['userId'] = $user['id'];
        }
        return false;
    }
    
    public static function checkSessionId()
    {
        if($_SESSION['userId'])
        {
            return $_SESSION['userId'];
        }
        header('Location: /user/auth');
    }
    
    public static function getUserById($id)
    {
        $ban = 0;
        
        $pdo = Db::getConnection();
        $sql = 'SELECT id, name, email, role FROM users WHERE id = :id AND ban = :ban';
        $result = $pdo->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':ban', $ban, PDO::PARAM_INT);
        $result->execute();
        $row = $result->fetch(PDO::FETCH_ASSOC);
        
        return $row;
    }
    
    public static function edit($id, $name, $email, $password)
    {
        $password = self::hashPassword($password);
        
        $pdo = Db::getConnection();
        $sql = 'UPDATE users SET name = :name, email = :email, password = :password WHERE id = :id';
        $result = $pdo->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);
        return $result->execute();
    }
}

