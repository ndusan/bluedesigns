<?php

class HomeModel extends Model
{
    private $type = 'home';
    
    private $tableStatic = 'static';
    private $tableStaticLanguage = 'static_language';
    private $tableLanguage = 'language';
    private $tableWork = 'work';
    private $tableWorkLanguage = 'work_language';
    private $tableWorkImage = 'work_images';
    
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
    
    
    public function getLattestProjects($params, $numOfProjects)
    {
        
        try{
            $output = array();
            
            $query = sprintf("SELECT `w`.`id`, `w`.`name`, `w`.`link` FROM %s AS `w` 
                                LEFT JOIN %s AS `wl` ON `wl`.`work_id`=`w`.`id`
                                LEFT JOIN %s AS `l` ON `l`.`id`=`wl`.`language_id`
                                WHERE `l`.`iso_code`=:isoCode ORDER BY `w`.`position` DESC LIMIT 0, %s", 
                                $this->tableWork, $this->tableWorkLanguage, $this->tableLanguage, $numOfProjects);
            $stmt = $this->dbh->prepare($query);
            
            $stmt->bindParam(':isoCode', $params['lang'], PDO::PARAM_STR);
            $stmt->execute();

            $response = $stmt->fetchAll();
            
            if(!empty($response)){
                foreach($response as $r){
                    $query = sprintf("SELECT `wi`.`image_name` FROM %s AS `wi` 
                                        WHERE `wi`.`work_id`=:workId ORDER BY `wi`.`id` ASC LIMIT 0,1", $this->tableWorkImage);
                    $stmt = $this->dbh->prepare($query);
                    
                    $stmt->bindParam(':workId', $r['id'], PDO::PARAM_STR);
                    $stmt->execute(); 
                    
                    $workImage = $stmt->fetch();
                    $r['image_name'] = $workImage['image_name'];
                    
                    $output[] = $r;
                }
            }
            
            return $output;
        }catch(Exception $e){
            
            return false;
        }
        
    }
}