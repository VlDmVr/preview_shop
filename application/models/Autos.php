<?php

class Autos
{
    public static function getAllAutos()
    { 
        $pdo = Db::getConnection();
        $sql = 'SELECT id, name, image, description, cat_id, price, status FROM autos';
        $result = $pdo->prepare($sql);
        $result->execute();
        while($row = $result->fetch(PDO::FETCH_ASSOC))
        {
            $autos[] = $row;
        }
        return $autos;
    }
    
    public static function getCategoryAutos($autos_id)
    {
       $status = 1;
       
        $pdo = Db::getConnection();
        $sql = 'SELECT id, name, image, cat_id, price FROM autos WHERE status = :status AND cat_id = :autos_id';
        $result = $pdo->prepare($sql);
        $result->bindParam(':status', $status, PDO::PARAM_INT);
        $result->bindParam(':autos_id', $autos_id, PDO::PARAM_INT);
        $result->execute();
        while($row = $result->fetch(PDO::FETCH_ASSOC))
        {
            $autos[] = $row;
        }
        return $autos;
    }
    
    public static function saveAutos($name, $price, $cat_id, $status, $description, $img_file)
    {
        $pdo = Db::getConnection();
        $sql = 'INSERT INTO autos (name, cat_id, image, description, price, status) VALUES (:name, :cat_id, :image, :description, :price, :status)';
        $result = $pdo->prepare($sql);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':price', $price, PDO::PARAM_INT);
        $result->bindParam(':cat_id', $cat_id, PDO::PARAM_INT);
        $result->bindParam(':status', $status, PDO::PARAM_INT);
        $result->bindParam(':description', $description, PDO::PARAM_STR);
        $result->bindParam(':image', $img_file, PDO::PARAM_STR);
        return $result->execute();
    }
    
    public static function getAutoById($id)
    {
        
        $pdo = Db::getConnection();
        $sql = 'SELECT id, name, cat_id, image, description, price, status FROM autos WHERE id = :id';
        $result = $pdo->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->execute();
        $row = $result->fetch(PDO::FETCH_ASSOC);
        
        return $row;  
    }
    
    public static function updateProduct($id, $name, $price, $cat_id, $status, $description, $image)
    {
        $pdo = Db::getConnection();
        $sql = 'UPDATE autos SET name = :name, price = :price, cat_id = :cat_id, status = :status, description = :description, image = :image WHERE id = :id';
        $result = $pdo->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':price', $price, PDO::PARAM_INT);
        $result->bindParam(':cat_id', $cat_id, PDO::PARAM_INT);
        $result->bindParam(':status', $status, PDO::PARAM_INT);
        $result->bindParam(':description', $description, PDO::PARAM_STR);
        $result->bindParam(':image', $image, PDO::PARAM_STR);
        return $result->execute();
    }
    
    public static function deleteAutoById($id)
    {
        $pdo = Db::getConnection();
        $sql = 'DELETE FROM autos WHERE id = :id';
        $result = $pdo->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();
    }
}

