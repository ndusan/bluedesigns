<?php

class NewsModel extends Model
{
    
    private $tableNews = 'news';
    
    public function getAllRows($params)
    {
        
        try{
            $query = sprintf("SELECT COUNT(*) AS `count` FROM %s", $this->tableNews);
            $stmt = $this->dbh->prepare($query);
            
            $stmt->execute();

            return $stmt->fetch();
        }catch(Exception $e){
            
            return false;
        }
    }
}