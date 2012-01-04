<?php

class CmsWorkController extends Controller
{
    
    public function indexAction($params)
    {
        
        if($this->isAjax()){
            
            $this->setRenderHTML(0);
            
            if($this->db->position($params)){

                echo json_encode(array('response'=>true));
            }else{

                echo json_encode(array('response'=>false));
            }
        }
        
        $this->set('workCollection', $this->db->findAll());
    }
    
    public function addAction($params)
    {
       
        if(!empty($params['submit'])){
            
            //Data submited
            if($id = $this->db->createWork($params['work'])){
                
                //If image uploaded add it
                if(!empty($params['file']) && !empty($id)){
                    $i=0;
                    foreach($params['file']['error'] as $k=>$v){
                        if(0 == $v){
                            
                            $image = array('name'=>$params['file']['name'][$k],
                                           'type'=>$params['file']['type'][$k],
                                           'tmp_name'=>$params['file']['tmp_name'][$k],
                                           'error'=>$params['file']['error'][$k]);
                            
                            $newImageName = time()+$i++.'-'.$params['file']['name'][$k];
                            $this->db->addFile($id, $newImageName, $params['text'][$k]);
                            $this->uploadImage($newImageName, $image, 'work');

                            //Create thumb
                            $this->createThumbImage($newImageName, 'work', 210, 110);
                        }
                    }
                }
                $this->redirect ('cms'.DS.'work', 'success');
            }else{
                $this->redirect ('cms'.DS.'work'.DS.'add', 'error');
            }
        }
    }
    
    public function editAction($params)
    {
       
        if(!empty($params['submit'])){
            //Data submited

            if($this->db->updateWork($params['work'])){
                //If image uploaded add it
                if(!empty($params['file']) && !empty($params['id'])){
                    $i=0;
                    foreach($params['file']['error'] as $k=>$v){
                        if(0 == $v){
                            
                            $image = array('name'=>$params['file']['name'][$k],
                                           'type'=>$params['file']['type'][$k],
                                           'tmp_name'=>$params['file']['tmp_name'][$k],
                                           'error'=>$params['file']['error'][$k]);
                            
                            $newImageName = time()+$i++.'-'.$params['file']['name'][$k];
                            
                            $this->db->addFile($params['id'], $newImageName, $params['text'][$k]);
                            $this->uploadImage($newImageName, $image, 'work');

                            //Create thumb
                            $this->createThumbImage($newImageName, 'work', 210, 110);
                        }
                    }
                }
                $this->redirect ('cms'.DS.'work', 'success');
            }else{
                $this->redirect ('cms'.DS.'work'.DS.'edit'.DS.$params['id'], 'error');
            }
        }
        $this->set('fileCollection', $this->db->getAllImages($params['id']));
        $this->set('work', $this->db->findWork($params['id']));
    }
    
    public function deleteAction($params)
    {
        $this->setRenderHTML(0);
        
        $data = $this->db->getAllImages($params['id']);
        if($this->db->deleteWork($params)){
            
            //If exist delete
            if(!empty($data)){
                foreach($data as $d){
                    $this->deleteImage($d['image_name'], 'work');
                    $this->deleteImage('thumb-'.$d['image_name'], 'work');
                }
            }
            $this->redirect ('cms'.DS.'work', 'success');
        }else{
            $this->redirect ('cms'.DS.'work', 'error');
        }
    }
    
    public function deleteImageAction($params)
    {
        $this->setRenderHTML(0);
        
        $data = $this->db->getImageName($params['file_id']);

        //If exist delete
        if(!empty($data)){
            
            $this->db->deleteImage($params['file_id']);
            $this->deleteImage($data['image_name'], 'work');
            $this->deleteImage('thumb-'.$data['image_name'], 'work');
        }
        
        echo json_encode(array('response'=>true));
    }
}