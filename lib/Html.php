<?php

/**
 * HTML 
 * @author Dusan Novakovic (ndusan@gmail.com)
 *
 */
class HTML {

    /**
     * Custom made css
     * @param array $array
     * @return string
     */
    function allCustomCss($path) {
        $string = '';
        foreach (glob($path . '*.css') as $fileName) {
            $string .= "<link href='" . DS . $fileName . "' rel='stylesheet' type='text/css' />\n";
        }

        return $string;
    }

    /**
     * Include JS
     * @param $fileName
     * @return string
     */
    function allCustomJs($path) {
        $string = '';
        foreach (glob($path . '*.js') as $fileName) {
            $string .= "<script src='" . DS . $fileName . "' type='text/javascript'></script>\n";
        }

        return $string;
    }

    /**
     * Include CSS
     * @param $fileName
     * @return string
     */
    function css($fileName, $path) {
        $data = "<link href='" . DS . $path . $fileName . ".css' rel='stylesheet' type='text/css'/>\n";

        return $data;
    }

    /**
     * Include JS
     * @param $fileName
     * @return string
     */
    function js($fileName, $path) {
        $data = "<script src='" . DS . $path . $fileName . ".js' type='text/javascript'></script>\n";

        return $data;
    }

    /**
     * Include JS
     * @param $fileName
     * @return string
     */
    function assetsJs($fileName, $path) {
        $data = "<script src='" . DS . $path . $fileName . ".js' type='text/javascript'></script>\n";

        return $data;
    }

    /**
     * Include CSS
     * @param $fileName
     * @return string
     */
    function assetsCss($fileName, $path) {
        $data = "<link href='" . DS . $path . $fileName . ".css' rel='stylesheet' type='text/css'/>\n";

        return $data;
    }

    /**
     * Display message
     * @param String $text
     * @return String
     */
    function msg($text) {

        if (!isset($text) || empty($text)) {

            return false;
        }

        $txt = "";
        switch ($text) {
            //Error
            case 'error':
                $txt = "<div class='error'>" . ERROR_MSG . "</div>";
                break;
            //Success
            case 'success':
                $txt = "<div class='success'>" . SUCCESS_MSG . "</div>";
                break;
            default:
                $txt = "<div class='error'>" . $text . "</div>";
                break;
        }

        return $txt;
    }

    function fb($link=null) {
        if (null == $link)
            return false;

        $array = array('href'=>$link,
                       'send'=>false,
                       'layout'=>'button_count',
                       'width'=>90,
                       'height'=>21,
                       'show_faces'=>false,
                       'action'=>'like',
                       'colorscheme'=>'light');
        return '<iframe src="http://www.facebook.com/plugins/like.php?'.  http_build_query($array).'" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:90px; height:21px;" allowTransparency="true"></iframe>';
    }
    
    function twitter($array){
        
        if(empty($array)) return false;

        $twitterArray = array('url'=> $array['url'],
                              'counturl'=>$array['url']);
        
        return '<script src="http://platform.twitter.com/widgets.js" type="text/javascript"></script>
               <a href="https://twitter.com/share?'.http_build_query($array['url']).'&text='.$array['text'].(!empty($array['url']) ? ' - '.$array['url'] : '').'" class="twitter-share-button" target="_blank">Tweet</a>';
    }

    function convertDate($date, $includeTime=false) {
        if (empty($date)) {

            return false;
        }

        //Remove time if exist
        if ($tmp = explode(' ', $date)) {

            $date = $tmp[0];
            $time = $tmp[1];
        }

        $oldDate = explode('-', $date);

        $result = $oldDate[2] . '-' . $oldDate[1] . '-' . $oldDate[0];

        if ($includeTime)
            $result.= ' ' . $tmp[1];

        return $result;
    }


}
