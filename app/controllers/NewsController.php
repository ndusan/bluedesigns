<?php

class NewsController extends Controller
{
    
    
    /**
     * HOME PAGE
     * @param type $params 
     */
    public function indexAction($params)
    {
        $numOfRows = $this->db->getNumOfRows($params);
        
        // number of rows to show per page
        $numOfResPerPage = 3;
        $range = 4;
        
        // find out total pages
        $totalPages = ceil($numOfRows['count'] / $numOfResPerPage);
        
        // get the current page or set a default
        if (isset($params['page']) && is_numeric($params['page'])) {
           // cast var as int
           $currentPage = (int) $params['page'];
        } else {
           // default page num
           $currentPage = 1;
        } // end if
        
        // if current page is greater than total pages...
        if ($currentPage > $totalPages) {
           // set current page to last page
           $currentPage = $totalPages;
        } // end if
        // if current page is less than first page...
        if ($currentPage < 1) {
           // set current page to first page
           $currentPage = 1;
        } // end if

        // the offset of the list, based on current page 
        $offset = ($currentPage - 1) * $numOfResPerPage;
        
        //This sets the range to display in our query 
        $results = $this->db->getResults($params, $offset, $numOfResPerPage);
        
        $this->set('resultCollection', $results);
        $this->set('pagination', array('range'=>$range, 'page'=>$currentPage, 'current'=>$currentPage, 'total'=>$totalPages));
        
        //For all
        $this->set('carouselCollection', $this->db->getCarousel($params));
        $this->set('quotes', $this->db->getQuotes($params));
        
        $this->set('isActive', $this->db->isActiveLang('en'));
        
    }
}