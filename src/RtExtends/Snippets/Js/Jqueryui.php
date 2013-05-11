<?php
// https://developers.google.com/speed/libraries/devguide

namespace RtExtends\Snippets\Js;

class Jqueryui{
    
    /**
     * Get url
     * @param string $version
     * @return string 
     */
    public static function getUrl($version = "1.10.2"){
        $versions = array("1.10.2","1.10.1","1.10.0","1.9.2","1.9.1","1.9.0","1.8.24","1.8.23","1.8.22","1.8.21","1.8.20","1.8.19","1.8.18","1.8.17","1.8.16","1.8.15","1.8.14","1.8.13","1.8.12","1.8.11","1.8.10","1.8.9","1.8.8","1.8.7","1.8.6","1.8.5","1.8.4","1.8.2","1.8.1","1.8.0","1.7.3","1.7.2","1.7.1","1.7.0","1.6.0","1.5.3","1.5.2");
        $base = "http://ajax.googleapis.com/ajax/libs/jqueryui/";
        
        if(!isset($versions[$version])){
            return $base."1.10.2"."/jquery-ui.min.js";
        }else{
            return $base . $versions[$version] . "/jquery-ui.min.js"; 
        }
    }
    
    /**
     * Get url of the JqueryUI theme
     * @param string $theme
     * @param string $version 
     * @return string 
     */
    public static function getThemeUrl($theme = "base", $version = "1.10.1"){
        $versions = array("1.10.1","1.9.2","1.7.2");
        $themes = array("base","black-tie","blitzer","cupertino","dark-hive","dot-luv","eggplant","excite-bike","flick","hot-sneaks","humanity","le-frog","mint-choc","overcast","pepper-grinder","redmond","smoothness","south-street","start","sunny","swanky-purse","trontastic","ui-darkness","ui-lightness","vader");
        
        if(!isset($versions[$version])){
            $version = "1.10.1";
        }
        
        if(!isset($themes[$theme])){
            $version = "base";
        }
        
        return "http://ajax.googleapis.com/ajax/libs/jqueryui/".$version."/themes/".$theme."/jquery-ui.css";
    }
}