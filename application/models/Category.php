<?php

class Category
{
    public static function getAllCategory()
    {
        $status = 1;
       
        $pdo = Db::getConnection();
        $sql = 'SELECT id, name, status, image FROM category WHERE status = :status';
        $result = $pdo->prepare($sql);
        $result->bindParam(':status', $status, PDO::PARAM_INT);
        $result->execute();
        while($row = $result->fetch(PDO::FETCH_ASSOC))
        {
            $category[] = $row;
        }
        return $category;
    }
    
    public static function getCategoryById($id)
    {
        $status = 1;
        
        $pdo = Db::getConnection();
        $sql = 'SELECT id, name, status, image FROM category WHERE status = :status AND id = :id';
        $result = $pdo->prepare($sql);
        $result->bindParam(':status', $status, PDO::PARAM_INT);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->execute();
        $row = $result->fetch(PDO::FETCH_ASSOC);
        
        return $row;
    }
    
    
    public static function getNameCategory($cat_id)
    {
        $status = 1;
        
        $pdo = Db::getConnection();
        $sql = 'SELECT name FROM category WHERE status = :status AND id = :cat_id';
        $result = $pdo->prepare($sql);
        $result->bindParam(':status', $status, PDO::PARAM_INT);
        $result->bindParam(':cat_id', $cat_id, PDO::PARAM_INT);
        $result->execute();
        $row = $result->fetch(PDO::FETCH_ASSOC);
        
        return $row;
    }
    
    public static function getIdCategory($name)
    {
        $status = 1;
        
        $pdo = Db::getConnection();
        $sql = 'SELECT id FROM category WHERE status = :status AND name = :name';
        $result = $pdo->prepare($sql);
        $result->bindParam(':status', $status, PDO::PARAM_INT);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->execute();
        $row = $result->fetch(PDO::FETCH_ASSOC);
        
        return $row;
    }
    
    public static function checkCreateFolder($name, $logo)
    {
        $arr_logo = explode('.', $logo);
        if((lcfirst($name) == lcfirst($arr_logo[0])) && $name && $logo)
        {
            return true;
        }
        return false;
    }
    
    public static function checkDir($folder_path, $name)
    {
        if(!is_dir($folder_path.$name.'/'))
        {
            return true;
        }
        return false;
    }
    
    public static function saveCategory($name, $status, $logo)
    {
        $pdo = Db::getConnection();
        $sql = 'INSERT INTO category (name, status, image) VALUES (:name, :status, :image)';
        $result = $pdo->prepare($sql);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':status', $status, PDO::PARAM_INT);
        $result->bindParam(':image', $logo, PDO::PARAM_STR);
        return $result->execute();
    }
    
    public static function deleteCatImage($image)
    {
        $path = './images/logo/'.$image;
        
        if(file_exists($path))
        {
            unlink($path);
            return true;
        }
        return false;
    }
    
    public static function deleteAutosDir($name)
    {
        $path = './images/autos/'.$name;
        if(is_dir($path))
        {
            rmdir($path);
            return true;   
        }
        return false;
    }
    
    public static function deleteCategoruById($id)
    {
        $pdo = Db::getConnection();
        $sql = 'DELETE FROM category WHERE id = :id';
        $result = $pdo->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();
    }
}