<?php

class StudioController extends Controller
{
    
    
    /**
     * HOME PAGE
     * @param type $params 
     */
    public function indexAction($params)
    {

        //For all
        $this->set('carouselCollection', $this->db->getCarousel($params));
        $this->set('quotes', $this->db->getQuotes($params));
        
        $this->set('studioCollection', $this->db->getStudio($params));
    }
}