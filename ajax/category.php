<?php
   /**
    * файл обработчик события отображающего 
    * список категорий существующих на данный момент в панели администратора(создать категорию)
    */
    include '../system/Db.php';

    $pdo = Db::getConnection(true);
    
    $status = 1;
       
    $sql = 'SELECT name FROM category WHERE status = :status';
    $result = $pdo->prepare($sql);
    $result->bindParam(':status', $status, PDO::PARAM_INT);
    $result->execute();
    while($row = $result->fetch(PDO::FETCH_ASSOC))
    {
        $categories[] = $row;
    }
    
    
    foreach($categories as $category)
    {
        $arr_name[] = $category['name'];
    }
    

    $all_category = json_encode($arr_name);
    echo $all_category;