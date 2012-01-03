<?php

class CmsHomeController extends Controller
{
    
    public function indexAction($params)
    {
        
        if(!empty($params['submit'])){
            //Data submited
            if($id = $this->db->submitHome($params['home'], 'home')){
                
                //If image uploaded add it
                if(isset($params['image']) && 0 == $params['image']['error'] && !empty($id)){
                    
                    $newImageName = $id.'-'.$params['image']['name'];
                    $this->db->updateImageName($id, $newImageName);
                    
                    $this->uploadImage($newImageName, $params['image'], 'static');
                }
                
                $this->redirect ('cms', 'success');
            }else{
                $this->redirect ('cms', 'error');
            }
        }

        $this->set('home', $this->db->findHome());
    }
    
    
    public function deleteImageAction($params)
    {
        $this->setRenderHTML(0);
        
        $data = $this->db->getImageName($params['id']);

        //If exist delete
        if(!empty($data)){
            
            $this->db->updateImageName($params['id'], '');
            $this->deleteImage($data['image_name'], 'static');
            
        }
        $this->redirect ('cms', 'success');
    }
    
    public function settingsAction($params)
    {

        if(!empty($params['cache']) && $params['cache'] == 'clean'){
            //Clean cache
            Cache::deleteDictionary();
        }elseif(!empty($params['submit'])){
            //Data submited
            
            if($this->db->setLanguage('en', $params['settings']['lang'])){
                //If image uploaded add it
                parent::redirect ('cms'.DS.'settings', 'success', '#fragment-2');
            }else{
                parent::redirect ('cms'.DS.'settings', 'error', '#fragment-2');
            }
        }
        
        $this->set('en', $this->db->isActive('en'));
    }
    
}