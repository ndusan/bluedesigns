<?php

class CmsQuotesController extends Controller
{
    
    public function indexAction($params)
    {
        if(!empty($params['id']) && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){
            $this->setRenderHTML(0);
            
            $this->db->setVisible($params);
            
            echo json_encode(array('true'));
        }else{
            
            $this->set('quotesCollection', $this->db->findAll());
        }
    }
    
    public function addAction($params)
    {
       
        if(!empty($params['submit'])){
            //Data submited
            if($id = $this->db->create($params['quotes'])){
                //If image uploaded add it
                if(0 == $params['image']['error'] && !empty($id)){
                    
                    $newImageName = $id.'-'.$params['image']['name'];
                    $this->db->setImageName($id, $newImageName);
                    $this->uploadImage($newImageName, $params['image'], 'quotes');
                    
                    //Create thumb
                    $this->createThumbImage($newImageName, 'quotes', 200, 95);
                }
                $this->redirect ('cms'.DS.'quotes', 'success');
            }else{
                $this->redirect ('cms'.DS.'quotes'.DS.'add', 'error');
            }
        }
    }
    
    public function editAction($params)
    {
       
        if(!empty($params['submit'])){
            //Data submited

            if($this->db->update($params['quotes'])){
                //If image uploaded add it
                
                if(0 == $params['image']['error']){
                    
                    $data = $this->db->getImageName($params['quotes']['id']);
                    $oldImageName = $data['image_name'];
                    
                    $newImageName = $params['quotes']['id'].'-'.$params['image']['name'];
                    $this->db->setImageName($params['quotes']['id'], $newImageName);
                    $this->reUploadImage($oldImageName, $newImageName, $params['image'], 'quotes');
                    
                    //Delete thumb
                    $oldThumbImageName = 'thumb-'.$oldImageName;
                    $this->deleteImage($oldThumbImageName, 'quotes');
                    //Create thumb
                    $this->createThumbImage($newImageName, 'quotes', 200, 95);
                }
                $this->redirect ('cms'.DS.'quotes', 'success');
            }else{
                $this->redirect ('cms'.DS.'quotes'.DS.'edit'.DS.$params['id'], 'error');
            }
        }
        $this->set('quotes', $this->db->find($params['id']));
    }
    
    public function deleteAction($params)
    {
        $this->setRenderHTML(0);
        
        $data = $this->db->getImageName($params['id']);
        if($this->db->delete($params)){
            
            //If exist delete
            if(!empty($data)){
                $oldImageName = $data['image_name'];
                $this->deleteImage($oldImageName, 'quotes');
                
                //Delete thumb
                $oldThumbImageName = 'thumb-'.$data['image_name'];
                $this->deleteImage($oldThumbImageName, 'quotes');
            }
            $this->redirect ('cms'.DS.'quotes', 'success');
        }else{
            $this->redirect ('cms'.DS.'quotes', 'error');
        }
    }
    
    public function deleteImageAction($params)
    {
        $this->setRenderHTML(0);
        
        $data = $this->db->getImageName($params['id']);

        //If exist delete
        if(!empty($data)){
            
            $this->db->setImageName($params['id'], '');
            $this->deleteImage($data['image_name'], 'quotes');
            
            //Delete thumb
            $oldThumbImageName = 'thumb-'.$data['image_name'];
            $this->deleteImage($oldThumbImageName, 'quotes');
        }
        $this->redirect ('cms'.DS.'quotes'.DS.'edit'.DS.$params['id'], 'success');
    }
    
}