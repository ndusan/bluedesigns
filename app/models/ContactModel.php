<?php

class ContactModel extends Model
{
    private $type = 'contact';
    
    private $tableStatic = 'static';
    private $tableStaticLanguage = 'static_language';
    private $tableLanguage = 'language';
    
    public function getContact($params)
    {
        try{
            $query = sprintf("SELECT `s`.`image_name`, `s`.`link`, `sl`.* FROM %s AS `s`
                                INNER JOIN %s AS `sl` ON `sl`.`static_id`=`s`.`id`
                                INNER JOIN %s AS `l` ON `l`.`id`=`sl`.`language_id`
                                WHERE `l`.`iso_code`=:isoCode AND `s`.`type`=:type ORDER BY `s`.`id` DESC",
                                $this->tableStatic, $this->tableStaticLanguage, $this->tableLanguage);
            $stmt = $this->dbh->prepare($query);
            
            $stmt->bindParam(':isoCode', $params['lang'], PDO::PARAM_STR);
            $stmt->bindParam(':type', $this->type, PDO::PARAM_STR);
            $stmt->execute();
            
            return $stmt->fetch();
        }catch(Exception $e){
            
            return false;
        }
    }
}