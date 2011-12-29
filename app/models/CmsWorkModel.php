<?php

class CmsWorkModel extends Model
{
    
    private $tableWork= 'work';
    private $tableLanguage= 'language';
    private $tableWorkLanguage= 'work_language';
    private $tableWorkImages= 'work_images';
    
    
    public function findAll()
    {
        try{
            $query = sprintf("SELECT * FROM %s", $this->tableWork);
            $stmt = $this->dbh->prepare($query);
            $stmt->execute();

            return $stmt->fetchAll();
        }catch(Exception $e){
            
            return false;
        }
    }
    
    
    public function findWork($id)
    {
        try{
            $query = sprintf("SELECT * FROM %s WHERE `id`=:id", $this->tableWork);
            $stmt = $this->dbh->prepare($query);
            
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            
            $object = $stmt->fetch();
            
            
            //Get languages translations
            $language = array();
            $query = sprintf("SELECT `l`.`iso_code`, `nl`.* FROM %s AS `l` 
                                INNER JOIN %s AS `nl` ON `l`.`id`=`nl`.`language_id` 
                                WHERE `nl`.`work_id`=:workId", $this->tableLanguage, $this->tableWorkLanguage);
            $stmt = $this->dbh->prepare($query);
            
            $stmt->bindParam(':workId', $id, PDO::PARAM_INT);
            $stmt->execute();
            
            $collection = $stmt->fetchAll();
            
            if(!empty($collection)){
                foreach ($collection as $k=>$v){
                    $language[$v['iso_code']]['description'] = $v['description'];
                }
            }
            
            $object['lang'] = $language;
            
            return $object;
        }catch(Exception $e){
            
            return false;
        }
    }
    
    
    
    public function updateWork($params)
    {
        
        try{
            $query = sprintf("UPDATE %s SET `name`=:name, `link`=:link WHERE `id`=:id", $this->tableWork);
            $stmt = $this->dbh->prepare($query);
            
            $stmt->bindParam(':name', $params['name'], PDO::PARAM_STR);
            $stmt->bindParam(':link', $params['link'], PDO::PARAM_STR);
            $stmt->bindParam(':id', $params['id'], PDO::PARAM_INT);
            $stmt->execute();
            
            //Set language translation
            foreach($params['description'] as $k=>$v){
                //Get language_id
                $query = sprintf("SELECT * FROM %s WHERE `iso_code`=:isoCode", $this->tableLanguage);
                $stmt = $this->dbh->prepare($query);
                $stmt->bindParam(':isoCode', $k, PDO::PARAM_STR);
                $stmt->execute();
                $response = $stmt->fetch();
                
                $query = sprintf("UPDATE %s SET  `description`=:description
                                    WHERE `work_id`=:workId AND `language_id`=:languageId",
                                $this->tableWorkLanguage);
                
                $stmt = $this->dbh->prepare($query);
                
                $stmt->bindParam(':description', $v, PDO::PARAM_STR);
                $stmt->bindParam(':workId', $params['id'], PDO::PARAM_INT);
                $stmt->bindParam(':languageId', $response['id'], PDO::PARAM_INT);
                $stmt->execute();
            }
            
            return true;
        }catch(Exception $e){
            
            return false;
        }
    }
    
    
    public function createWork($params)
    {
        
        try{
            $query = sprintf("INSERT INTO %s SET `name`=:name, `link`=:link", $this->tableWork);
            $stmt = $this->dbh->prepare($query);
            
            $stmt->bindParam(':name', $params['name'], PDO::PARAM_STR);
            $stmt->bindParam(':link', $params['link'], PDO::PARAM_STR);
            $stmt->execute();
            
            $workId = $this->dbh->lastInsertId();
            
            //Set language translation
            foreach($params['description'] as $k=>$v){
                //Get language_id
                $query = sprintf("SELECT * FROM %s WHERE `iso_code`=:isoCode", $this->tableLanguage);
                $stmt = $this->dbh->prepare($query);
                $stmt->bindParam(':isoCode', $k, PDO::PARAM_STR);
                $stmt->execute();
                $response = $stmt->fetch();
                
                $query = sprintf("INSERT INTO %s SET `work_id`=:workId, `language_id`=:languageId, 
                                                     `description`=:description",
                                $this->tableWorkLanguage);
                $stmt = $this->dbh->prepare($query);
                
                $stmt->bindParam(':workId', $workId, PDO::PARAM_INT);
                $stmt->bindParam(':languageId', $response['id'], PDO::PARAM_INT);
                $stmt->bindParam(':description', $v, PDO::PARAM_STR);
                $stmt->execute();
            }
            
            return $workId;
        }catch(Exception $e){
            
            return false;
        }
    }
    
    
    public function addFile($id, $imageName)
    {
        try{
            //Insert into files table
            $query = sprintf("INSERT INTO %s SET `image_name`=:imageName, `work_id`=:workId", $this->tableWorkImages);
            $stmt = $this->dbh->prepare($query);
            
            $stmt->bindParam(':imageName', $imageName, PDO::PARAM_STR);
            $stmt->bindParam(':workId', $id, PDO::PARAM_INT);
            $stmt->execute();
        }catch(Exception $e){
            
            return false;
        }
        
    } 
    
    
    
    public function getAllImages($id)
    {
        
        $query = sprintf("SELECT * FROM %s WHERE `work_id`=:workId", $this->tableWorkImages);
        $stmt = $this->dbh->prepare($query);

        $stmt->bindParam(':workId', $id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll();
    }
    
    
    
    public function getImageName($id)
    {
        
        $query = sprintf("SELECT * FROM %s WHERE `id`=:id", $this->tableWorkImages);
        $stmt = $this->dbh->prepare($query);

        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch();
    }
    
    
    
    public function deleteWork($params)
    {
        
        $query = sprintf("DELETE FROM %s WHERE `work_id`=:workId", $this->tableWorkLanguage);
        $stmt = $this->dbh->prepare($query);

        $stmt->bindParam(':workId', $params['id'], PDO::PARAM_INT);
        $stmt->execute();

        $query = sprintf("DELETE FROM %s WHERE `id`=:id", $this->tableWork);
        $stmt = $this->dbh->prepare($query);

        $stmt->bindParam(':id', $params['id'], PDO::PARAM_INT);
        $stmt->execute();
        
        return true;
    }
    
    
    
    public function deleteImage($id)
    {
        
        $query = sprintf("DELETE FROM %s WHERE `id`=:id", $this->tableWorkImages);
        $stmt = $this->dbh->prepare($query);

        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        
        return true;
    }
    
}