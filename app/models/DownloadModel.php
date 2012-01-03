<?php

class DownloadModel extends Model
{
    
    private $tableWallpaper = 'wallpaper';
    private $tableWallpaperImages = 'wallpaper_images';
    
    
    public function getWallpapers($params)
    {
        
        try{
            $output = array();
            
            $query = sprintf("SELECT * FROM %s ORDER BY `id` DESC", $this->tableWallpaper);
            $stmt = $this->dbh->prepare($query);
            $stmt->execute();

            $results =  $stmt->fetchAll();
            
            if(!empty($results)){
                foreach($results as $r){
                    $query = sprintf("SELECT * FROM %s WHERE `wallpaper_id`=:wallpaperId", $this->tableWallpaperImages);
                    $stmt = $this->dbh->prepare($query);
                    
                    $stmt->bindParam(':wallpaperId', $r['id'], PDO::PARAM_INT);
                    $stmt->execute();

                    $r['other'] =  $stmt->fetchAll();
                    $output[] = $r;
                }
                
            }
            
            return $output;
        }catch(Exception $e){

            return false;
        }
    }
}