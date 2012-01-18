<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en-US" xml:lang="en-US" xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Blue Designs</title>
        <link rel="shortcut icon" href="<?= IMAGE_PATH . 'favicon.ico'; ?>" type="image/x-icon" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="Description" content="" />
        <meta name="Keywords" content="" />
        <meta http-equiv="X-UA-Compatible" content="IE=7" />
        <meta name="google-site-verification" content="FS52dewZbrEpkOtZ8OiqOxUpjNiOvAvFVb_-p7FeCBA" />
        <!-- Load all assets (js + css) -->
        <?= $html->assetsJs('jquery-1.6.4.min', ASSETS_JS_PATH); ?>
        <?= $html->assetsJs('slides.min.jquery', ASSETS_JS_PATH); ?>
        <?= $html->assetsJs('jquery.lightbox-0.5.min', ASSETS_JS_PATH); ?>
        <?= $html->assetsJs('jquery-ui-1.8.16.custom.min', ASSETS_JS_PATH); ?>
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

        <div class="headerW">
            <div class="header"> 
                <a class="logo" href="/">
                    <img src="<?= IMAGE_PATH . 'logo.png'; ?>" />
                </a>
                <? include_once VIEW_PATH . 'home' . DS . '_mainNavigation.php'; ?>
            </div>   
        </div> 
        <div class="contentW">
            <div class="content">
                <!-- This is a content that will be included on page inside of this layout -->
                <? if (file_exists(VIEW_PATH . $this->_controller . DS . $this->_action . 'View.php'))
                    include (VIEW_PATH . $this->_controller . DS . $this->_action . 'View.php'); ?>
            </div>
        </div>
        <div class="bottomW">
            <div class="bottom">
                <? include_once VIEW_PATH . 'home' . DS . '_quotes.php'?>
            </div>
        </div>
        <div class="footer">
            <p>&copy;2012 Blue Designs. All rights reserved.</p>
            <a href="http://www.facebook.com/bluedesigns" target="_blank" class="fb"></a><a href="https://twitter.com/#!/bluedesigns2012" target="_blank"class="tw"></a><a href="#" class="yt"></a>
            <a class="logoFooter">
                <img src="<?= IMAGE_PATH . 'logoFooter.png'; ?>" />
            </a>
        </div>
        <script type="text/javascript">
          var _gaq = _gaq || [];
          _gaq.push(['_setAccount', 'UA-28022272-1']);
          _gaq.push(['_trackPageview']);

          (function() {
            var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
          })();
        </script>
    </body>
</html>