<?php

/**
 * Get data location
 * 
 * Please don't forget to help 'Elevenbasetwo'
 * 
 * @author Remi THOMAS 
 * @see http://daspecster.github.io/ziptastic/index.html
 * 
 */

namespace RtExtends\Useful\Location;

class Ziptastic{
    
    const ZIPTASTIC_V2 = "http://zip.elevenbasetwo.com/v2/";
    
    /**
     * Get data location
     * 
     * @example
     * $data = RtExtends\Useful\Location\Ziptastic::dataLocation("US", "33330");
     * 
     * @param string $country
     * @param string $zipcode
     * @return stdClass 
     */
    public static function dataLocation($country, $zipcode){
        
        // call to http://zip.elevenbasetwo.com/v2/
        try{
            $url = self::ZIPTASTIC_V2 . $country . "/" . $zipcode;
            
            // call 
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
            $recived_content = curl_exec($ch); 
            return \Zend\Json\Json::decode($recived_content);
            
        } catch(Exception $e) {
            // error Ziptastic
            
        }
    }
    
}
