<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en-US" xml:lang="en-US" xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Putovanja za dvoje</title>
        <link rel="shortcut icon" href="<?= IMAGE_PATH . 'favicon.ico'; ?>" type="image/x-icon" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="Description" content="" />
        <meta name="Keywords" content="" />
        <meta http-equiv="X-UA-Compatible" content="IE=7" />
        <!-- Load all assets (js + css) -->
        <?= $html->assetsJs('jquery-1.6.4.min', ASSETS_JS_PATH); ?>
        <?= $html->assetsJs('slides.min.jquery', ASSETS_JS_PATH); ?>
        <?= $html->assetsJs('jquery.lightbox-0.5.min', ASSETS_JS_PATH); ?>
        <?= $html->assetsJs('app', ASSETS_JS_PATH); ?>
        <?= $html->assetsCss('default', ASSETS_CSS_PATH); ?>
        <?= $html->assetsCss('jquery.lightbox-0.5', ASSETS_CSS_PATH); ?>

        <!-- Load all custom js -->
        <?= $html->js('app', JS_PATH); ?>
        <?= $html->allCustomJs(JS_PATH . 'default' . DS); ?>

        <!-- Load all custom css -->
        <?= $html->css('default', CSS_PATH); ?>
        <link href='http://fonts.googleapis.com/css?family=Francois+One&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    </head>
    <body data-controller="<?= $this->_controller; ?>" data-method="<?= $this->_action; ?>">
        <div class="headerC">
            <div class="header">
                    <div class="Hlogo"></div>
                    <div class="langBar">SR / EN</div>
                    <div class="menu">
                        <ul>
                            <li class="btn_home"><a <?=('index'==$this->_action?'style="background-position: 0px -60px;"': '');?> href="/">HOME</a></li>
                            <li class="btn_studio"><a <?=('studio'==$this->_action?'style="background-position: -110px -60px;"': '');?> href="/studio">STUDIO</a></li>
                            <li class="btn_portfolio"><a <?=('portfolio'==$this->_action?'style="background-position: -220px -60px;"': '');?> href="/portfolio">OUR WORK</a></li>
                            <li class="btn_news"><a <?=('news'==$this->_action?'style="background-position: -330px -60px;"': '');?> href="/news">NEWS</a></li>
                            <li class="btn_download"><a <?=('download'==$this->_action?'style="background-position: -440px -60px;"': '');?> href="/download">DOWNLOADS</a></li>
                            <li class="btn_contact"><a <?=('contact'==$this->_action?'style="background-position: -550px -60px;"': '');?> href="/contact">CONTACT</a></li>
                        </ul>
                    </div>
             </div>         
        </div>
        <div class="mainC">
            <!-- This is a content that will be included on page inside of this layout -->
            <? if (file_exists(VIEW_PATH . $this->_controller . DS . $this->_action . 'View.php'))
        include (VIEW_PATH . $this->_controller . DS . $this->_action . 'View.php'); ?>  
        </div>
        
        
       
        <div class="quotesC">
            <div class="quotes">
                <div class="quotes_text">We needed to capitalise on our market leading position in grassroots sports marketing and Mr B & Friends created an excellent solution for taking the Activate UK brand forward. The design concept encapsulates our business philosophy and the emotive nature of our industry in a creative and memorable way.</div>
                <div class="quotes_signatures">Nikola Kovačević</div>
                <div class="quotes_companies">Naxi Media Group</div>
            </div>

            <div class="quotes_clients" id="jall-quotes">
                <h3 class="white">What our clients had to say:</h3>
                    <ul>
                        <li> <img src="<?= IMAGE_PATH . 'usce-logo-inactive.jpg'; ?>" /></li>
                        <li> <img src="<?= IMAGE_PATH . 'usce-logo-inactive.jpg'; ?>" /></li>
                        <li> <img src="<?= IMAGE_PATH . 'usce-logo-inactive.jpg'; ?>" /></li>
                        <li> <img src="<?= IMAGE_PATH . 'usce-logo-inactive.jpg'; ?>" /></li>
                       
                    </ul>
            </div>
            
          </div>
           <div class="footerC">  
            <div class="footer-bg-logo">
                    <div class="footer-text">2011 Blue Designs. All rights reserved</div>
                    <div class="socialGroups"><img src="<?= IMAGE_PATH . 'fb.png'; ?>" width="30" height="30" /><img src="<?= IMAGE_PATH . 'tw.png'; ?>" width="30" height="30" /><img src="<?= IMAGE_PATH . 'yt.png'; ?>" width="30" height="30" /></div>
                </div>
            
        </div>
        
        
    
    
    </body>
</html>