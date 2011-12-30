<?php

class NewsModel extends Model
{
    
    private $tableNews = 'news';
    private $tableNewsLanguage = 'news_language';
    private $tableLanguage = 'language';
    
    public function getNumOfRows($params)
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
    
    public function getResults($params, $limit, $perPage)
    {
        
        try{
            $query = sprintf("SELECT `n`.`image_name`, `nl`.* FROM %s AS `n`
                                INNER JOIN %s AS `nl` ON `nl`.`news_id`=`n`.`id`
                                INNER JOIN %s AS `l` ON `l`.`id`=`nl`.`language_id`
                                WHERE `l`.`iso_code`=:isoCode
                                ORDER BY `n`.`id` DESC LIMIT %d, %d", 
                                $this->tableNews, 
                                $this->tableNewsLanguage, 
                                $this->tableLanguage, 
                                $limit, $perPage);
            $stmt = $this->dbh->prepare($query);
            
            $stmt->bindParam(':isoCode', $params['lang'], PDO::PARAM_STR);
            
            $stmt->execute();

            return $stmt->fetchAll();
        }catch(Exception $e){
            
            return false;
        }
    }
}