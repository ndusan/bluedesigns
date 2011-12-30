<?php

class CmsWallpaperController extends Controller
{
    
    public function indexAction($params)
    {
        
        $this->set('wallpaperCollection', $this->db->findAll());
    }
    
    public function addAction($params)
    {
        
        if(!empty($params['submit'])){
            
            $imageGroups = array('800x600', '1024x768', '1400x1900', '1600x1200');
            //Check if at least one has been uploaded
            $uploaded = false;
            foreach($imageGroups as $g){
                if($params['image']['error'][$g] == 0) $uploaded = true;
            }
            
            if(!$uploaded) $this->redirect ('cms'.DS.'wallpaper'.DS.'add', 'error');
            
            //First will be thumb
            $isThumb = true;
            
            //Data submited
            if($id = $this->db->create($params['wallpaper'])){
                //If image uploaded add it
                $i = 0;
                foreach($imageGroups as $g){
                    if(0 == $params['image']['error'][$g] && !empty($id)){

                        $newImageName = (time()+$i++).'-'.$params['image']['name'][$g];
                        
                        $this->db->setImageName($id, $newImageName, $g);
                        
                        $image = array('name'=>$params['image']['name'][$g],
                                       'type'=>$params['image']['type'][$g],
                                       'tmp_name'=>$params['image']['tmp_name'][$g],
                                       'error'=>$params['image']['error'][$g],
                                       'size'=>$params['image']['size'][$g]);
                        
                        $info = $this->uploadImage($newImageName, $image, 'wallpaper');

                        if($isThumb){
                            $this->createThumbImage($newImageName, 'wallpaper', 128, 133);
                            
                            $this->db->setThumbImage($id, 'thumb-'.$newImageName);
                            $isThumb = false;
                        }
                    }
                }
                
                $this->redirect ('cms'.DS.'wallpaper', 'success');
            }else{
                $this->redirect ('cms'.DS.'wallpaper'.DS.'add', 'error');
            }
        }
    }
    
    public function editAction($params)
    {
        if(!empty($params['submit'])){
            //Data submited

            $imageGroups = array('800x600', '1024x768', '1400x1900', '1600x1200');
            
            if($this->db->update($params['wallpaper'])){
                $i=0;
                foreach($imageGroups as $g){
                    if(isset($params['image']['error'][$g]) && 0 == $params['image']['error'][$g] && !empty($params['wallpaper']['id'])){
                        
                        $newImageName = (time()+$i++).'-'.$params['image']['name'][$g];
                        $this->db->setImageName($params['wallpaper']['id'], $newImageName, $g);

                        $image = array('name'=>$params['image']['name'][$g],
                                       'type'=>$params['image']['type'][$g],
                                       'tmp_name'=>$params['image']['tmp_name'][$g],
                                       'error'=>$params['image']['error'][$g],
                                       'size'=>$params['image']['size'][$g]);
                        
                        $info = $this->uploadImage($newImageName, $image, 'wallpaper');
                    }
                }
                
                $this->redirect ('cms'.DS.'wallpaper', 'success');
            }else{
                $this->redirect ('cms'.DS.'wallpaper'.DS.'edit'.DS.$params['id'], 'error');
            }
        }
        
        $this->set('wallpaper', $this->db->find($params['id']));
    }
    
    public function deleteAction($params)
    {
        $this->setRenderHTML(0);
        
        $data = $this->db->getImageNames($params['id']);
        $thumbData = $this->db->getThumbImageName($params['id']);
        
        if($this->db->delete($params)){
            
            //If exist delete
            if(!empty($data)){
                foreach($data as $d){
                    $oldImageName = $d['image_name'];
                    $this->deleteImage($oldImageName, 'wallpaper');
                }
            }
            
            if(!empty($thumbData)){
                
                $oldImageName = $thumbData['image_name'];
                $this->deleteImage($oldImageName, 'wallpaper');
            }
            
            $this->redirect ('cms'.DS.'wallpaper', 'success');
        }else{
            $this->redirect ('cms'.DS.'wallpaper', 'error');
        }
    }
    
    
    public function deleteImageAction($params)
    {
        
        $this->setRenderHTML(0);
        
        $data = $this->db->getImageName($params['image_id'], $params['group']);
        $thumbData = $this->db->getThumbImageName($params['id']);
        
        if($this->db->deleteImage($params)){
            
            //If exist delete
            if(!empty($data)){
                $oldImageName = $data['image_name'];
                $this->deleteImage($oldImageName, 'wallpaper');
            }
            
            if(!$this->db->checkIfLastImage($params)){
                $this->deleteAction($params);
                
                if(!empty($thumbData)){

                    $oldImageName = $thumbData['image_name'];
                    $this->deleteImage($oldImageName, 'wallpaper');
                }
            }
            
            
            
            $this->redirect ('cms'.DS.'wallpaper'.DS.'edit'.DS.$params['id'], 'success');
        }else{
            $this->redirect ('cms'.DS.'wallpaper'.DS.'edit'.DS.$params['id'], 'error');
        }
    }
    
    
}