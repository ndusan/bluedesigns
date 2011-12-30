<?php

class WorkController extends Controller
{
    
    
    /**
     * HOME PAGE
     * @param type $params 
     */
    public function indexAction($params)
    {
        
        $this->set('quotes', $this->db->getQuotes($params));
    }
    
    
    
}