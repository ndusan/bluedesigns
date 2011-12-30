<?php

class CmsWallpaperModel extends Model
{
    
    private $tableLanguage = 'language';
    private $tableStatic = 'static';
    private $tableStaticLanguage = 'static_language';
    private $tableFiles = 'files';
    
    private $tableWallpaper = 'wallpaper';
    private $tableWallpaperImage = 'wallpaper_images';
    
    
    
    public function create($params)
    {
        try{
            $query = sprintf("INSERT INTO %s SET `created`=CURRENT_TIMESTAMP", $this->tableWallpaper);
            $stmt = $this->dbh->prepare($query);
            $stmt->execute();
            
            return $this->dbh->lastInsertId();
        }catch(Exception $e){
            
            return false;
        }
    }
    
    
    public function setImageName($id, $imageName, $group)
    {
        try{
            $query = sprintf("INSERT INTO %s SET `image_name`=:imageName, `wallpaper_id`=:wallpaperId, `group`=:group", $this->tableWallpaperImage);
            $stmt = $this->dbh->prepare($query);
            
            $stmt->bindParam(':imageName', $imageName, PDO::PARAM_STR);
            $stmt->bindParam(':wallpaperId', $id, PDO::PARAM_INT);
            $stmt->bindParam(':group', $group, PDO::PARAM_STR);
            $stmt->execute();
            
            return true;
        }catch(Exception $e){
            
            return false;
        }
    }
    
    public function update($params)
    {
       
        return true;
    }
    
    
    public function getImageName($id, $group)
    {
        try{
            $query = sprintf("SELECT `image_name` FROM %s WHERE `id`=:id AND `group`=:group", $this->tableWallpaperImage);
            $stmt = $this->dbh->prepare($query);

            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->bindParam(':group', $group, PDO::PARAM_STR);
            $stmt->execute();

            return $stmt->fetch();
        }catch(Exception $e){
            
            return false;
        }
    }
    
    
    
    public function getImageNames($id)
    {
        try{
            $query = sprintf("SELECT `image_name` FROM %s WHERE `wallpaper_id`=:wallpaperId", $this->tableWallpaperImage);
            $stmt = $this->dbh->prepare($query);

            $stmt->bindParam(':wallpaperId', $id, PDO::PARAM_INT);
            $stmt->execute();

            return $stmt->fetchAll();
        }catch(Exception $e){
            
            return false;
        }
    }
    
    
    public function find($id)
    {
        $output = array();
        
        try{
            
            $query = sprintf("SELECT * FROM %s WHERE `wallpaper_id`=:wallpaperId", $this->tableWallpaperImage);
            $stmt = $this->dbh->prepare($query);
            
            $stmt->bindParam(':wallpaperId', $id, PDO::PARAM_INT);
            $stmt->execute();

            $results = $stmt->fetchAll();
            
            if(!empty ($results)){
                foreach($results as $r){
                    
                    $output[$r['group']] = $r;
                }
            }
            
            $output['id'] = $id;
            
            return $output;
        }catch(Exception $e){
            
            return false;
        }
    }
    
    
    public function findAll()
    {
        try{
            $query = sprintf("SELECT * FROM %s", $this->tableWallpaper);
            $stmt = $this->dbh->prepare($query);
            $stmt->execute();

            return $stmt->fetchAll();
        }catch(Exception $e){
            
            return false;
        }
    }
    
    
    public function delete($params)
    {
        
        try{
            $query = sprintf("DELETE FROM %s  WHERE `id`=:id", $this->tableWallpaper);
            $stmt = $this->dbh->prepare($query);

            $stmt->bindParam(':id', $params['id'], PDO::PARAM_INT);
            $stmt->execute();
            
            $query = sprintf("DELETE FROM %s  WHERE `wallpaper_id`=:wallpaperId", $this->tableWallpaperImage);
            $stmt = $this->dbh->prepare($query);

            $stmt->bindParam(':wallpaperId', $params['id'], PDO::PARAM_INT);
            $stmt->execute();
            
            return true;
        }catch(Exception $e){
            
            return false;
        }
    } 
    
    
    public function deleteImage($params)
    {
        
        try{
            $query = sprintf("DELETE FROM %s  WHERE `wallpaper_id`=:wallpaperId AND `group`=:group", $this->tableWallpaperImage);
            $stmt = $this->dbh->prepare($query);

            $stmt->bindParam(':wallpaperId', $params['id'], PDO::PARAM_INT);
            $stmt->bindParam(':group', $params['group'], PDO::PARAM_STR);
            $stmt->execute();
            
            return true;
        }catch(Exception $e){
            
            return false;
        }
    } 
    
    public function checkIfLastImage($params)
    {
        
        try{
            $query = sprintf("SELECT * FROM %s WHERE `wallpaper_id`=:wallpaperId", $this->tableWallpaperImage);
            $stmt = $this->dbh->prepare($query);
            
            $stmt->bindParam(':wallpaperId', $params['id'], PDO::PARAM_INT);
            $stmt->execute();

            return $stmt->fetch() ? true : false;
        }catch(Exception $e){
            
            return false;
        }
    }
    
    
    public function setThumbImage($id, $imageName)
    {
        try{
            $query = sprintf("UPDATE %s SET `image_name`=:imageName WHERE `id`=:id", $this->tableWallpaper);
            $stmt = $this->dbh->prepare($query);
            
            $stmt->bindParam(':imageName', $imageName, PDO::PARAM_STR);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            
            return true;
        }catch(Exception $e){
            
            return false;
        }
    }
    
    
    public function getThumbImageName($id)
    {
        
        try{
            $query = sprintf("SELECT * FROM %s WHERE `id`=:id", $this->tableWallpaper);
            $stmt = $this->dbh->prepare($query);
            
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            return $stmt->fetch();
        }catch(Exception $e){
            
            return false;
        }
    }
}