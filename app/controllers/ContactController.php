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
            
            $array = array('name' => 'Name',
                           'email'=> 'E-mail',
                           'phone'=> 'Phone',
                           'company'=>'Company',
                           'country'=>'Conutry',
                           'message'=>'Message');
            
            $this->sendEmail(MAIL_TO, 'Contact form', $params['contact'], MAIL_FROM, $array);
            
            $this->set('sent', true);
        }
        
        $this->set('contactCollection', $this->db->getContact($params));
        
        //For all
        $this->set('carouselCollection', $this->db->getCarousel($params));
        $this->set('quotes', $this->db->getQuotes($params));
        $this->set('isActive', $this->db->isActiveLang('en'));
    }
    
    
    
}