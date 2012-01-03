<?php

class CmsStudioModel extends Model
{
    private $tableStudio= 'studio';
    private $tableLanguage= 'language';
    private $tableStudioLanguage= 'studio_language';
    
    
    public function findAll()
    {
        try{
            $query = sprintf("SELECT * FROM %s ORDER BY `position` DESC", $this->tableStudio);
            $stmt = $this->dbh->prepare($query);
            $stmt->execute();

            return $stmt->fetchAll();
        }catch(Exception $e){
            
            return false;
        }
    }
    
    
    public function find($id)
    {
        try{
            $query = sprintf("SELECT * FROM %s WHERE `id`=:id", $this->tableStudio);
            $stmt = $this->dbh->prepare($query);
            
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            
            $object = $stmt->fetch();
            
            
            //Get languages translations
            $language = array();
            $query = sprintf("SELECT `l`.`iso_code`, `nl`.* FROM %s AS `l` 
                                INNER JOIN %s AS `nl` ON `l`.`id`=`nl`.`language_id` 
                                WHERE `nl`.`studio_id`=:studioId", $this->tableLanguage, $this->tableStudioLanguage);
            $stmt = $this->dbh->prepare($query);
            
            $stmt->bindParam(':studioId', $id, PDO::PARAM_INT);
            $stmt->execute();
            
            $collection = $stmt->fetchAll();
            
            if(!empty($collection)){
                foreach ($collection as $k=>$v){
                    $language[$v['iso_code']]['title'] = $v['title'];
                    $language[$v['iso_code']]['text'] = $v['text'];
                }
            }
            
            $object['lang'] = $language;
            
            return $object;
        }catch(Exception $e){
            
            return false;
        }
    }
    
    
    
    public function update($params)
    {
        
        try{
            //Set language translation
            foreach($params['content'] as $k=>$v){
                //Get language_id
                $query = sprintf("SELECT * FROM %s WHERE `iso_code`=:isoCode", $this->tableLanguage);
                $stmt = $this->dbh->prepare($query);
                $stmt->bindParam(':isoCode', $k, PDO::PARAM_STR);
                $stmt->execute();
                $response = $stmt->fetch();
                
                $query = sprintf("UPDATE %s SET `title`=:title, `text`=:text
                                    WHERE `studio_id`=:studioId AND `language_id`=:languageId",
                                $this->tableStudioLanguage);
                
                $stmt = $this->dbh->prepare($query);
                
                $stmt->bindParam(':title', $params['title'][$k], PDO::PARAM_STR);
                $stmt->bindParam(':text', $v, PDO::PARAM_STR);
                $stmt->bindParam(':studioId', $params['id'], PDO::PARAM_INT);
                $stmt->bindParam(':languageId', $response['id'], PDO::PARAM_INT);
                $stmt->execute();
            }
            
            return true;
        }catch(Exception $e){
            
            return false;
        }
    }
    
    
    public function create($params)
    {
        
        try{
            $query = sprintf("INSERT INTO %s SET `created`=CURRENT_TIMESTAMP, `position`=:position", $this->tableStudio);
            $stmt = $this->dbh->prepare($query);

            $position = time();
            $stmt->bindParam(':position', $position, PDO::PARAM_STR);
            $stmt->execute();
            
            $studioId = $this->dbh->lastInsertId();
            
            //Set language translation
            foreach($params['title'] as $k=>$v){
                //Get language_id
                $query = sprintf("SELECT * FROM %s WHERE `iso_code`=:isoCode", $this->tableLanguage);
                $stmt = $this->dbh->prepare($query);
                $stmt->bindParam(':isoCode', $k, PDO::PARAM_STR);
                $stmt->execute();
                $response = $stmt->fetch();
                
                $query = sprintf("INSERT INTO %s SET `studio_id`=:studioId, `language_id`=:languageId, 
                                                     `title`=:title, `text`=:text",
                                $this->tableStudioLanguage);
                
                $stmt = $this->dbh->prepare($query);
                
                $stmt->bindParam(':studioId', $studioId, PDO::PARAM_INT);
                $stmt->bindParam(':languageId', $response['id'], PDO::PARAM_INT);
                $stmt->bindParam(':title', $v, PDO::PARAM_STR);
                $stmt->bindParam(':text', $params['content'][$k], PDO::PARAM_STR);
                $stmt->execute();
            }
            
            return $studioId;
        }catch(Exception $e){
            
            return false;
        }
    }
    
    
    public function getImageName($id)
    {
        
        try{
            $query = sprintf("SELECT `image_name` FROM %s WHERE `id`=:id", $this->tableStudio);
            $stmt = $this->dbh->prepare($query);

            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            return $stmt->fetch();
        }catch(Exception $e){
            
            return false;
        }
    }
    
    
    public function setImageName($id, $imageName)
    {
        try{
            $query = sprintf("UPDATE %s SET `image_name`=:imageName WHERE `id`=:id", $this->tableStudio);
            $stmt = $this->dbh->prepare($query);
            
            $stmt->bindParam(':imageName', $imageName, PDO::PARAM_STR);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            
            return true;
        }catch(Exception $e){
            
            return false;
        }
    }
    
    
    public function delete($params)
    {
        
        try{
            $query = sprintf("DELETE FROM %s WHERE `id`=:id", $this->tableStudio);
            $stmt = $this->dbh->prepare($query);
            
            $stmt->bindParam(':id', $params['id'], PDO::PARAM_INT);
            $stmt->execute();
            
            
            $query = sprintf("DELETE FROM %s WHERE `studio_id`=:studioId", $this->tableStudioLanguage);
            $stmt = $this->dbh->prepare($query);

            $stmt->bindParam(':studioId', $params['id'], PDO::PARAM_INT);
            $stmt->execute();

            return true;
        }catch(Exception $e){
            
            return false;
        }
    }
    
    
    public function position($params)
    {
        try{
            $query = sprintf("UPDATE %s AS `s` SET 
                                    `s`.`position`=:start WHERE `id`=:endId", $this->tableStudio);
            $stmt = $this->dbh->prepare($query);
            
            $stmt->bindParam(':start', $params['start'], PDO::PARAM_INT);
            $stmt->bindParam(':endId', $params['end_id'], PDO::PARAM_INT);
            $stmt->execute();

            $query = sprintf("UPDATE %s AS `s` SET 
                                    `s`.`position`=:end WHERE `id`=:startId", $this->tableStudio);
            $stmt = $this->dbh->prepare($query);
            
            $stmt->bindParam(':end', $params['end'], PDO::PARAM_INT);
            $stmt->bindParam(':startId', $params['start_id'], PDO::PARAM_INT);
            $stmt->execute();

            return true;
        }catch(Exception $e){
            
            return false;
        }
    }
}