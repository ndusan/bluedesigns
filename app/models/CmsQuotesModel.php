<?php

class CmsQuotesModel extends Model
{
    private $tableQuotes= 'quotes';
    private $tableLanguage= 'language';
    private $tableQuotesLanguage= 'quotes_language';
    
    
    public function findAll()
    {
        try{
            $query = sprintf("SELECT * FROM %s", $this->tableQuotes);
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
            $query = sprintf("SELECT * FROM %s WHERE `id`=:id", $this->tableQuotes);
            $stmt = $this->dbh->prepare($query);
            
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            
            $object = $stmt->fetch();
            
            
            //Get languages translations
            $language = array();
            $query = sprintf("SELECT `l`.`iso_code`, `nl`.* FROM %s AS `l` 
                                INNER JOIN %s AS `nl` ON `l`.`id`=`nl`.`language_id` 
                                WHERE `nl`.`quotes_id`=:quotesId", $this->tableLanguage, $this->tableQuotesLanguage);
            $stmt = $this->dbh->prepare($query);
            
            $stmt->bindParam(':quotesId', $id, PDO::PARAM_INT);
            $stmt->execute();
            
            $collection = $stmt->fetchAll();
            
            if(!empty($collection)){
                foreach ($collection as $k=>$v){
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
            $query = sprintf("UPDATE %s SET `client`=:client, `company`=:company WHERE `id`=:id", $this->tableQuotes);
            $stmt = $this->dbh->prepare($query);
            
            $stmt->bindParam(':client', $params['client'], PDO::PARAM_STR);
            $stmt->bindParam(':company', $params['company'], PDO::PARAM_STR);
            $stmt->bindParam(':quotesId', $params['id'], PDO::PARAM_INT);
            $stmt->execute();
            
            //Set language translation
            foreach($params['text'] as $k=>$v){
                //Get language_id
                $query = sprintf("SELECT * FROM %s WHERE `iso_code`=:isoCode", $this->tableLanguage);
                $stmt = $this->dbh->prepare($query);
                $stmt->bindParam(':isoCode', $k, PDO::PARAM_STR);
                $stmt->execute();
                $response = $stmt->fetch();
                
                $query = sprintf("UPDATE %s SET `text`=:text
                                    WHERE `quotes_id`=:quotesId AND `language_id`=:languageId",
                                $this->tableQuotesLanguage);
                
                $stmt = $this->dbh->prepare($query);
                
                $stmt->bindParam(':text', $v, PDO::PARAM_STR);
                $stmt->bindParam(':quotesId', $params['id'], PDO::PARAM_INT);
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
            $query = sprintf("INSERT INTO %s SET `client`=:client, `company`=:company", $this->tableQuotes);
            $stmt = $this->dbh->prepare($query);
            
            $stmt->bindParam(':client', $params['client'], PDO::PARAM_STR);
            $stmt->bindParam(':company', $params['company'], PDO::PARAM_STR);
            $stmt->execute();
            
            $quotesId = $this->dbh->lastInsertId();
            
            //Set language translation
            foreach($params['text'] as $k=>$v){
                //Get language_id
                $query = sprintf("SELECT * FROM %s WHERE `iso_code`=:isoCode", $this->tableLanguage);
                $stmt = $this->dbh->prepare($query);
                $stmt->bindParam(':isoCode', $k, PDO::PARAM_STR);
                $stmt->execute();
                $response = $stmt->fetch();
                
                $query = sprintf("INSERT INTO %s SET `quotes_id`=:quotesId, `language_id`=:languageId, `text`=:text",
                                $this->tableQuotesLanguage);
                
                $stmt = $this->dbh->prepare($query);
                
                $stmt->bindParam(':quotesId', $quotesId, PDO::PARAM_INT);
                $stmt->bindParam(':languageId', $response['id'], PDO::PARAM_INT);
                $stmt->bindParam(':text', $v, PDO::PARAM_STR);
                $stmt->execute();
            }
            
            return $quotesId;
        }catch(Exception $e){
            
            return false;
        }
    }
    
    
    public function getImageName($id)
    {
        
        try{
            $query = sprintf("SELECT `image_name` FROM %s WHERE `id`=:id", $this->tableQuotes);
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
            $query = sprintf("UPDATE %s SET `image_name`=:imageName WHERE `id`=:id", $this->tableQuotes);
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
            $query = sprintf("DELETE FROM %s WHERE `id`=:id", $this->tableQuotes);
            $stmt = $this->dbh->prepare($query);
            
            $stmt->bindParam(':id', $params['id'], PDO::PARAM_INT);
            $stmt->execute();
            
            
            $query = sprintf("DELETE FROM %s WHERE `quotes_id`=:quotesId", $this->tableQuotesLanguage);
            $stmt = $this->dbh->prepare($query);

            $stmt->bindParam(':quotesId', $params['id'], PDO::PARAM_INT);
            $stmt->execute();

            return true;
        }catch(Exception $e){
            
            return false;
        }
    } 
    
    
    public function setVisible($params)
    {
        
        try{
            $query = sprintf("UPDATE %s SET `visible`=(1-`visible`) WHERE `id`=:id", $this->tableQuotes);
            $stmt = $this->dbh->prepare($query);
            
            $stmt->bindParam(':id', $params['id'], PDO::PARAM_INT);
            $stmt->execute();
            
            return true;
        }catch(Exception $e){
            
            return false;
        }
    }
}