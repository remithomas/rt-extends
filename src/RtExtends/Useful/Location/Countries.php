<?php

namespace RtExtends\Useful\Location;

use DateTimeZone;

class Countries{
    
    public static function getCountries($language = "en_US"){
        return array_merge(array(''=>'---'), include("vendor/umpirsky/country-list/country/cldr/".$language."/country.php"));
    }
    
}