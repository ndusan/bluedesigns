<?php

class HomeModel extends Model
{
    private $type = 'home';
    
    private $tableStatic = 'static';
    private $tableStaticLanguage = 'static_language';
    private $tableLanguage = 'language';
    private $tableCarousel = 'carousel';
    private $tableCarouselLanguage = 'carousel_language';
    
    public function getHome($params)
    {
        try{
            $query = sprintf("SELECT `s`.*, `sl`.`text`, `sl`.`title` FROM %s AS `s` 
                                LEFT JOIN %s AS `sl` ON `sl`.`static_id`=`s`.`id`
                                LEFT JOIN %s AS `l` ON `l`.`id`=`sl`.`language_id`
                                WHERE `s`.`type`=:type AND `l`.`iso_code`=:isoCode", $this->tableStatic, $this->tableStaticLanguage, $this->tableLanguage);
            $stmt = $this->dbh->prepare($query);
            
            $stmt->bindParam(':type', $this->type, PDO::PARAM_STR);
            $stmt->bindParam(':isoCode', $params['lang'], PDO::PARAM_STR);
            $stmt->execute();

            return $stmt->fetch();
        }catch(Exception $e){
            
            return false;
        }
    }
    
    public function getCarousel($params)
    {
        try{
            $query = sprintf("SELECT `c`.*, `cl`.`text` FROM %s AS `c` 
                                LEFT JOIN %s AS `cl` ON `cl`.`carousel_id`=`c`.`id`
                                LEFT JOIN %s AS `l` ON `l`.`id`=`cl`.`language_id`
                                WHERE `l`.`iso_code`=:isoCode", $this->tableCarousel, $this->tableCarouselLanguage, $this->tableLanguage);
            $stmt = $this->dbh->prepare($query);
            
            $stmt->bindParam(':isoCode', $params['lang'], PDO::PARAM_STR);
            $stmt->execute();

            return $stmt->fetchAll();
        }catch(Exception $e){
            
            return false;
        }
        
    }
}