<?php

class ContactController extends Controller
{
    
    private $type = 'contact';
    
    /**
     * HOME PAGE
     * @param type $params 
     */
    public function indexAction($params)
    {
        
        if(!empty($params['submit'])){
            
            
        }
        
        $this->set('contactCollection', $this->db->getContact($params));
        
        //For all
        $this->set('quotes', $this->db->getQuotes($params));
    }
    
    
    
}