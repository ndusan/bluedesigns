<?php

class StudioModel extends Model
{
    private $tableLanguage = 'language';
    private $tableStudio = 'studio';
    private $tableStudioLanguage = 'studio_language';
    
    public function getStudio($params)
    {
        try{
            $query = sprintf("SELECT `s`.`image_name`, `sl`.* FROM %s AS `s`
                                INNER JOIN %s AS `sl` ON `sl`.`studio_id`=`s`.`id`
                                INNER JOIN %s AS `l` ON `l`.`id`=`sl`.`language_id`
                                WHERE `l`.`iso_code`=:isoCode ORDER BY `s`.`id` DESC",
                                $this->tableStudio, $this->tableStudioLanguage, $this->tableLanguage);
            $stmt = $this->dbh->prepare($query);
            
            $stmt->bindParam(':isoCode', $params['lang'], PDO::PARAM_STR);
            $stmt->execute();
            
            return $stmt->fetchAll();
        }catch(Exception $e){
            
            return false;
        }
    }
    
}