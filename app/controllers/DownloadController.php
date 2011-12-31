<?php

class DownloadController extends Controller
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
        
        $this->set('wallpaperCollection', $this->db->getWallpapers($params));
    }
    
    
    
}