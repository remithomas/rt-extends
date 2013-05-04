<?php
// https://developers.google.com/speed/libraries/devguide

namespace RtExtends\Snippets\Js;

class Jquery{
    
    /**
     *
     * @param string $version
     * @return string 
     */
    public static function getUrl($version = "1.9.1"){
        $versions = array("2.0.0","1.9.1","1.9.0","1.8.3","1.8.2","1.8.1","1.8.0","1.7.2","1.7.1","1.7.0","1.6.4","1.6.3","1.6.2","1.6.1","1.6.0","1.5.2","1.5.1","1.5.0","1.4.4","1.4.3","1.4.2","1.4.1","1.4.0","1.3.2","1.3.1","1.3.0","1.2.6","1.2.3");
        $base = "http://ajax.googleapis.com/ajax/libs/jquery/";
        
        if(!isset($versions[$version])){
            return $base."1.9.1"."/jquery.min.js";
        }else{
            return $base . $versions[$version] . "/jquery.min.js"; 
        }
    }
}