<?php

class CmsStaticController extends Controller
{
    
    public function indexAction($params){}
    
    public function aboutUsAction($params)
    {
        
        if(!empty($params['submit'])){
            //Data submited
            if($this->db->submit($params['aboutus'], 'aboutus')){
                
                parent::redirect ('cms'.DS.'static'.DS.'about-us', 'success');
            }else{
                parent::redirect ('cms'.DS.'static'.DS.'about-us', 'error');
            }
        }
        
        $aboutUs = null;
        if(!empty($params['aboutus']['id'])){
            $aboutUs = $this->db->find($id, 'aboutus');
        }
        
        parent::set('aboutus', $aboutUs);
    }
    
    
}