<?php

class DownloadController extends Controller
{
    
    
    /**
     * HOME PAGE
     * @param type $params 
     */
    public function indexAction($params)
    {
        
        $this->set('wallpaperCollection', $this->db->getWallpapers($params));
        $this->set('quotes', $this->db->getQuotes($params));
    }
    
    
    
}