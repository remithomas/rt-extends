<?php
/**
 * Countries list
 * 
 * @author Remi THOMAS
 * @deprecated will be removed the next version
 */

namespace RtExtends\Useful;

/**
 * Countries class 
 */
class Countries{
    
    /**
     * Get list of countries
     * @param string $language
     * @return array 
     */
    public static function getCountries($language = "en_US"){
        return array_merge(array(''=>'---'), include("vendor/umpirsky/country-list/country/cldr/".$language."/country.php"));
    }
    
}