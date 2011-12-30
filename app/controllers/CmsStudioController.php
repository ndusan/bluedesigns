<?php

class CmsStudioController extends Controller
{
    
    public function indexAction($params)
    {
        $this->set('studioCollection', $this->db->findAll());
    }
    
    public function addAction($params)
    {
       
        if(!empty($params['submit'])){
            //Data submited
            if($id = $this->db->create($params['studio'])){
                //If image uploaded add it
                if(0 == $params['image']['error'] && !empty($id)){
                    
                    $newImageName = $id.'-'.$params['image']['name'];
                    $this->db->setImageName($id, $newImageName);
                    $this->uploadImage($newImageName, $params['image'], 'studio');
                    
                    //Create thumb
                    $this->createThumbImage($newImageName, 'studio', 200, 95);
                }
                $this->redirect ('cms'.DS.'studio', 'success');
            }else{
                $this->redirect ('cms'.DS.'studio'.DS.'add', 'error');
            }
        }
    }
    
    public function editAction($params)
    {
       
        if(!empty($params['submit'])){
            //Data submited

            if($this->db->update($params['studio'])){
                //If image uploaded add it
                
                if(0 == $params['image']['error']){
                    
                    $data = $this->db->getImageName($params['studio']['id']);
                    $oldImageName = $data['image_name'];
                    
                    $newImageName = $params['studio']['id'].'-'.$params['image']['name'];
                    $this->db->setImageName($params['studio']['id'], $newImageName);
                    $this->reUploadImage($oldImageName, $newImageName, $params['image'], 'studio');
                    
                    //Delete thumb
                    $oldThumbImageName = 'thumb-'.$oldImageName;
                    $this->deleteImage($oldThumbImageName, 'studio');
                    //Create thumb
                    $this->createThumbImage($newImageName, 'studio', 200, 95);
                }
                $this->redirect ('cms'.DS.'studio', 'success');
            }else{
                $this->redirect ('cms'.DS.'studio'.DS.'edit'.DS.$params['id'], 'error');
            }
        }
        $this->set('studio', $this->db->find($params['id']));
    }
    
    public function deleteAction($params)
    {
        $this->setRenderHTML(0);
        
        $data = $this->db->getImageName($params['id']);
        if($this->db->delete($params)){
            
            //If exist delete
            if(!empty($data)){
                $oldImageName = $data['image_name'];
                $this->deleteImage($oldImageName, 'studio');
                
                //Delete thumb
                $oldThumbImageName = 'thumb-'.$data['image_name'];
                $this->deleteImage($oldThumbImageName, 'quotes');
            }
            $this->redirect ('cms'.DS.'studio', 'success');
        }else{
            $this->redirect ('cms'.DS.'studio', 'error');
        }
    }
    
    public function deleteImageAction($params)
    {
        $this->setRenderHTML(0);
        
        $data = $this->db->getImageName($params['id']);

        //If exist delete
        if(!empty($data)){
            
            $this->db->setImageName($params['id'], '');
            $this->deleteImage($data['image_name'], 'studio');
            
            //Delete thumb
            $oldThumbImageName = 'thumb-'.$data['image_name'];
            $this->deleteImage($oldThumbImageName, 'studio');
        }
        $this->redirect ('cms'.DS.'studio'.DS.'edit'.DS.$params['id'], 'success');
    }
    
}