<?php

class HomeController extends Controller
{
    
    private $numOfLattestProjects = 5;
    
    /**
     * HOME PAGE
     * @param type $params 
     */
    public function indexAction($params)
    {
        
        $this->set('lattestProjectsCollection', $this->db->getLattestProjects($params, $this->numOfLattestProjects));
        $this->set('carouselCollection', $this->db->getCarousel($params));
        $this->set('homeCollection', $this->db->getHome($params));
        
        $this->set('isActive', $this->db->isActiveLang('en'));
        
        $this->set('quotes', $this->db->getQuotes($params));
    }
    
    
    
}