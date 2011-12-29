<?php

class HomeController extends Controller
{
    
    
    /**
     * HOME PAGE
     * @param type $params 
     */
    public function indexAction($params)
    {
        
        $this->set('carouselCollection', $this->db->getCarousel($params));
        $this->set('homeCollection', $this->db->getHome($params));
    }
    
    
    
}