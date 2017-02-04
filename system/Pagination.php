<?php

class Pagination
{
    public $per_page = 5;
    
    public $cnt_rows = null;
    
    public $page = null;
    
    public $start = null;
    
    public $arrLimitItems = array();
    
    public $linkPage = null;
    
    public function __construct($table=null, $id)
    {
        $this->cnt_rows = $this->getModelCount($table);
        $this->page = $this->getPage($id);
        $this->start = $this->getStart();
        $this->arrLimitItems = $this->getLimitItems($table);
        $this->linkPage = $this->getLinkPage();
    }
    
    public function getModelCount($table)
    {
        $pdo = Db::getConnection();
        $sql = "SELECT COUNT(*) FROM $table";
        $result = $pdo->prepare($sql);
        $result->execute();
        
        $number_of_rows = $result->fetchColumn();
        
        return $number_of_rows;
    }
    
    public function getPage($id)
    {
        if($id)
        {
            return $id;
        }
        return 1;
    }
    
    public function getStart()
    {
        return ($this->page - 1) * $this->per_page;
    }
    
    public function getLimitItems($table)
    {
        $pdo = Db::getConnection();
        $sql = "SELECT * ,c.name AS producer FROM $table LEFT JOIN category c ON cat_id = c.id LIMIT :start,:per_page";
        $result = $pdo->prepare($sql);
        $result->bindParam(':start', $this->start, PDO::PARAM_INT);
        $result->bindParam(':per_page', $this->per_page, PDO::PARAM_INT);
        $result->execute();
        while($row = $result->fetch(PDO::FETCH_ASSOC))
        {
            $limit_items[] = $row;
        }
        return $limit_items;
    }
    
    public function getLinkPage()
    {
        $cnt_link_page = ceil($this->cnt_rows / $this->per_page);
        return $cnt_link_page; 
    }
    
}

