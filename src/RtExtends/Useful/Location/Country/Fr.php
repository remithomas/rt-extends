<?php

/**
 *
 * @author Remi THOMAS 
 */

namespace RtExtends\Useful\Location\Country;

class Fr{
    
    /**
     * List of French States
     * @return array 
     */
    public static function states(){
        return array(
            "42" => "Alsace",
            "72" => "Aquitaine",
            "83" => "Auvergne",
            "26" => "Bourgogne",
            "53" => "Bretagne",
            "24" => "Centre",
            "21" => "Champagne-Ardenne",
            "94" => "Corse",
            "43" => "Franche-Comté",
            "01" => "Guadeloupe",
            "03" => "Guyane",
            "11" => "Île-de-France",
            "91" => "Languedoc-Roussillon",
            "74" => "Limousin",
            "41" => "Lorraine",
            "02" => "Martinique",
            "73" => "Midi-Pyrénées",
            "31" => "Nord-Pas-de-Calais",
            "25" => "Basse-Normandie",
            "23" => "Haute-Normandie",
            "52" => "Pays de la Loire",
            "22" => "Picardie",
            "54" => "Poitou-Charentes",
            "93" => "Provence-Alpes-Côte d'Azur",
            "04" => "La Réunion",
            "82" => "Rhône-Alpes",
        );
    }
    
    public static function counties(){
        
    }
    
    public static function countiesByState($stateCode){
        
    }
    
}
