<?php

/**
 * Favicon
 * 
 * Credits : http://snipplr.com/view.php?codeview&id=45928
 * 
 * @author Remi THOMAS 
 */

namespace RtExtends\Useful\File;

class Favicon{
    
    /**
     * Get favicon
     * @param string $url
     * @return string 
     */
    public static function getFavicon($url){
        $url = str_replace("http://",'',$url);
        return "http://www.google.com/s2/favicons?domain=".$url;
    }
}