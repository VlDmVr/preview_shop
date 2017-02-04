<?php

class Admin
{
    /*
    public static function selectCatName($autos)
    {
        foreach($autos as $auto){  
            
            $pdo = Db::getConnection();
            
            $sql = 'SELECT name FROM category WHERE id = :id';
            $result2 = $pdo->prepare($sql);
            $result2->bindParam(':id', $auto['cat_id'], PDO::PARAM_INT);
            $result2->execute();
            $row2 = $result2->fetch(PDO::FETCH_ASSOC);
            $auto['producer'] = $row2['name'];
            $products_arr[] = $auto;  
        }
        return $products_arr;
    }
    */
    
    public static function getImage($img_str, $partial_path)
    {
        $userfile = $img_str;
        
        if( is_uploaded_file( $_FILES[$userfile]['tmp_name'] ) )
        {
            
            if( $_FILES[$userfile]['size'] <= 1000000 )
            {
                move_uploaded_file( $_FILES[$userfile]['tmp_name'], './images/'.$partial_path.'/'.$_FILES[$userfile]['name'] );
                return true;
            }
        }
        else
        {
            return false;
        }
    }
    
    public static function checkInformation($name, $price, $producer, $description)
    {
        if( $name && $price && $producer && $description )
        {
            return true;
        }
        return false;
    }
    
    public static function deleteImage($img_data, $folder_name)
    {
        $path = './images/'.$folder_name.'/'.$img_data;
        
        if(file_exists($path))
        {
            unlink($path);
            return true;
        }
        return false;
    }

}
