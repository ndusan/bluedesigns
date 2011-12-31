<?php

class WorkController extends Controller
{
    
    
    /**
     * HOME PAGE
     * @param type $params 
     */
    public function indexAction($params)
    {
        $this->set('workCollection', $this->db->getWork($params));
        $this->set('cWork', $this->db->getCurrentWork($params));
        
        
        //For all
        $this->set('quotes', $this->db->getQuotes($params));
    }
    
    
    
}