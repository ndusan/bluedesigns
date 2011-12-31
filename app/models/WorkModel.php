<?php

class WorkModel extends Model
{
    
    private $tableWork = 'work';
    private $tableWorkLanguage = 'work_language';
    private $tableWorkImages = 'work_images';
    private $tableLanguage = 'language';
    
    public function getWork($params)
    {
        try{
            
            $query = sprintf("SELECT `w`.`id`, `w`.`name`, `w`.`link`, `wl`.`description` FROM %s AS `w`
                                INNER JOIN %s AS `wl` ON `wl`.`work_id`=`w`.`id`
                                INNER JOIN %s AS `l` ON `l`.`id`=`wl`.`language_id`
                                WHERE `l`.`iso_code`=:isoCode ORDER BY `w`.`id` DESC",
                                $this->tableWork, $this->tableWorkLanguage, $this->tableLanguage);
            $stmt = $this->dbh->prepare($query);
            
            $stmt->bindParam(':isoCode', $params['lang'], PDO::PARAM_STR);
            $stmt->execute();
            
            return $stmt->fetchAll();
        }catch(Exception $e){
            
            return false;
        }
    }
    
    
    
    
    public function getCurrentWork($params)
    {
        try{
        
            $output = array();
            
            if(!empty($params['id']) && is_numeric($params['id'])){
                $query = sprintf("SELECT `w`.`id`, `w`.`name`, `w`.`link`, `wl`.`description` FROM %s AS `w`
                                INNER JOIN %s AS `wl` ON `wl`.`work_id`=`w`.`id`
                                INNER JOIN %s AS `l` ON `l`.`id`=`wl`.`language_id`
                                WHERE `l`.`iso_code`=:isoCode AND `w`.`id`=:id ORDER BY `w`.`id` DESC",
                                $this->tableWork, $this->tableWorkLanguage, $this->tableLanguage);
                $stmt = $this->dbh->prepare($query);
                
                $stmt->bindParam(':isoCode', $params['lang'], PDO::PARAM_STR);
                $stmt->bindParam(':id', $params['id'], PDO::PARAM_INT);
            }else{
                //Get the one with biggest id
                $query = sprintf("SELECT `w`.`id`, `w`.`name`, `w`.`link`, `wl`.`description` FROM %s AS `w`
                                INNER JOIN %s AS `wl` ON `wl`.`work_id`=`w`.`id`
                                INNER JOIN %s AS `l` ON `l`.`id`=`wl`.`language_id`
                                WHERE `l`.`iso_code`=:isoCode ORDER BY `w`.`id` DESC LIMIT 0,1",
                                $this->tableWork, $this->tableWorkLanguage, $this->tableLanguage);
                $stmt = $this->dbh->prepare($query);
                
                $stmt->bindParam(':isoCode', $params['lang'], PDO::PARAM_STR);
            }
            
            $stmt->execute();
            
            $response = $stmt->fetch();
            
            if(!empty($response)){
                   
                $query = sprintf("SELECT * FROM %s WHERE `work_id`=:workId ORDER BY `id` DESC", $this->tableWorkImages);
                $stmt = $this->dbh->prepare($query);

                $stmt->bindParam(':workId', $response['id'], PDO::PARAM_INT);
                $stmt->execute();

                $response['other'] = $stmt->fetchAll();

                $output = $response;
                    
            }
            
            return $output;
        }catch(Exception $e){
            
            return false;
        }
    }
}