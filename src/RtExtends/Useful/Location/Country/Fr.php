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
    
    /**
     * List of French counties
     * @return array 
     */
    public static function counties(){
        return array(
            "01" => "Ain",
            "02" => "Aisne",
            "03" => "Allier",
            "04" => "Alpes de Haute Provence",
            "05" => "Hautes Alpes",
            "06" => "Alpes Maritimes",
            "07" => "Ardèche",
            "08" => "Ardennes",
            "09" => "Ariège",
            "10" => "Aube",
            "11" => "Aude",
            "12" => "Aveyron",
            "13" => "Bouches-du-Rhône",
            "14" => "Calvados",
            "15" => "Cantal",
            "16" => "Charente",
            "17" => "Charente-Maritime",
            "18" => "Cher",
            "19" => "Corrèze",
            "2A" => "Corse-du-Sud",
            "2B" => "Haute-Corse",
            "21" => "Côte-d'Or",
            "22" => "Côtes-d'Armor",
            "23" => "Creuse",
            "24" => "Dordogne",
            "25" => "Doubs",
            "26" => "Drôme",
            "27" => "Eure",
            "28" => "Eure-et-Loir",
            "29" => "Finistère",
            "30" => "Gard",
            "31" => "Haute-Garonne",
            "32" => "Gers",
            "33" => "Gironde",
            "34" => "Hérault",
            "35" => "Ille-et-Vilaine",
            "36" => "Indre",
            "37" => "Indre-et-Loire",
            "38" => "Isère",
            "39" => "Jura",
            "40" => "Landes",
            "41" => "Loir-et-Cher",
            "42" => "Loire",
            "43" => "Haute-Loire",
            "44" => "Loire-Atlantique",
            "45" => "Loiret",
            "46" => "Lot",
            "47" => "Lot-et-Garonne",
            "48" => "Lozère",
            "49" => "Maine-et-Loire",
            "50" => "Manche",
            "51" => "Marne",
            "52" => "Haute-Marne",
            "53" => "Mayenne",
            "54" => "Meurthe-et-Moselle",
            "55" => "Meuse",
            "56" => "Morbihan",
            "57" => "Moselle",
            "58" => "Nièvre",
            "59" => "Nord",
            "60" => "Oise",
            "61" => "Orne",
            "62" => "Pas-de-Calais",
            "63" => "Puy-de-Dôme",
            "64" => "Pyrénées-Atlantiques",
            "65" => "Hautes-Pyrénées",
            "66" => "Pyrénées-Orientales",
            "67" => "Bas-Rhin",
            "68" => "Haut-Rhin",
            "69" => "Rhône",
            "70" => "Haute-Saône",
            "71" => "Saône-et-Loire",
            "72" => "Sarthe",
            "73" => "Savoie",
            "74" => "Haute-Savoie",
            "75" => "Paris",
            "76" => "Seine-Maritime",
            "77" => "Seine-et-Marne",
            "78" => "Yvelines",
            "79" => "Deux-Sèvres",
            "80" => "Somme",
            "81" => "Tarn",
            "82" => "Tarn-et-Garonne",
            "83" => "Var",
            "84" => "Vaucluse",
            "85" => "Vendée",
            "86" => "Vienne",
            "87" => "Haute-Vienne",
            "88" => "Vosges",
            "89" => "Yonne",
            "90" => "Territoire de Belfort",
            "91" => "Essonne",
            "92" => "Hauts-de-Seine",
            "93" => "Seine Saint-Denis",
            "94" => "Val-de-Marne",
            "95" => "Val-d'Oise",
            "971" => "Guadeloupe",
            "972" => "Martinique",
            "973" => "Guyane",
            "974" => "La Réunion",
            "976" => "Mayotte",
        );
    }
    
    /**
     * 
     * @return array 
     */
    public static function countiesStructured(){
        return array(
            array(
                'label' => 'Alsace', 
                'options' => array(
                    "67" => "Bas-Rhin",
                    "68" => "Haut-Rhin",
                )
            ),
            array(
                'label' => 'Aquitaine', 
                'options' => array(
                    "24" => "Dordogne",
                    "33" => "Gironde",
                    "40" => "Landes",
                    "47" => "Lot-et-Garonne",
                    "64" => "Pyrénées-Atlantiques",
                )
            ),
            array(
                'label' => 'Auvergne', 
                'options' => array(
                    "03" => "Allier",
                    "15" => "Cantal",
                    "43" => "Haute-Loire",
                    "63" => "Puy-de-Dôme",
                )
            ),
            array(
                'label' => 'Bourgogne', 
                'options' => array(
                    "21" => "Côte-d'Or",
                    "58" => "Nièvre",
                    "71" => "Saône-et-Loire",
                    "89" => "Yonne",
                )
            ),
            array(
                'label' => 'Bretagne', 
                'options' => array(
                    "22" => "Côtes-d'Armor",
                    "29" => "Finistère",
                    "35" => "Ille-et-Vilaine",
                    "56" => "Morbihan",
                )
            ),
            array(
                'label' => 'Centre', 
                'options' => array(
                    "18" => "Cher ",
                    "28" => "Eure-et-Loir",
                    "36" => "Indre",
                    "37" => "Indre-et-Loire",
                    "41" => "Loir-et-Cher",
                    "45" => "Loiret",
                )
            ),
            array(
                'label' => 'Champagne-Ardenne', 
                'options' => array(
                    "08" => "Ardennes",
                    "10" => "Aube",
                    "51" => "Marne",
                    "52" => "Haute-Marne",
                )
            ),
            array(
                'label' => 'Corse', 
                'options' => array(
                    "2A" => "Corse-du-Sud",
                    "2B" => "Haute-Corse",
                )
            ),
            array(
                'label' => 'Franche-Comté', 
                'options' => array(
                    "25" => "Doubs",
                    "39" => "Jura",
                    "70" => "Haute-Saône",
                    "90" => "Territoire de Belfort",
                )
            ),
            array(
                'label' => 'Guadeloupe', 
                'options' => array(
                    "971" => "Guadeloupe",
                )
            ),
            array(
                'label' => 'Guyane', 
                'options' => array(
                    "973" => "Guyane",
                )
            ),
            array(
                'label' => 'Île-de-France', 
                'options' => array(
                    "75" => "Paris",
                    "91" => "Essonne",
                    "92" => "Hauts-de-Seine",
                    "93" => "Seine-Saint-Denis",
                    "77" => "Seine-et-Marne",
                    "94" => "Val-de-Marne",
                    "95" => "Val-d'Oise",
                    "78" => "Yvelines",
                )
            ),
            array(
                'label' => 'Languedoc-Roussillon', 
                'options' => array(
                    "11" => "Aude",
                    "30" => "Gard",
                    "34" => "Hérault",
                    "48" => "Lozère",
                    "66" => "Pyrénées-Orientales",
                )
            ),
            array(
                'label' => 'Limousin', 
                'options' => array(
                    "19" => "Corrèze",
                    "23" => "Creuse",
                    "87" => "Haute-Vienne",
                )
            ),
            array(
                'label' => 'Lorraine', 
                'options' => array(
                    "54" => "Meurthe-et-Moselle",
                    "55" => "Meuse",
                    "57" => "Moselle",
                    "88" => "Vosges",
                )
            ),
            array(
                'label' => 'Martinique', 
                'options' => array(
                    "972" => "Martinique",
                )
            ),
            array(
                'label' => 'Midi-Pyrénées', 
                'options' => array(
                    "09" => "Ariège",
                    "12" => "Aveyron",
                    "31" => "Haute-Garonne",
                    "32" => "Gers",
                    "46" => "Lot",
                    "65" => "Hautes-Pyrénées",
                    "81" => "Tarn",
                    "82" => "Tarn-et-Garonne",
                )
            ),
            array(
                'label' => 'Nord-Pas-de-Calais', 
                'options' => array(
                    "59" => "Nord ",
                    "62" => "Pas-de-Calais",
                )
            ),
            array(
                'label' => 'Basse-Normandie', 
                'options' => array(
                    "14" => "Calvados",
                    "50" => "Manche",
                    "61" => "Orne",
                )
            ),
            array(
                'label' => 'Haute-Normandie', 
                'options' => array(
                    "27" => "Eure",
                    "76" => "Seine-Maritime",
                )
            ),
            array(
                'label' => 'Pays de la Loire', 
                'options' => array(
                    "44" => "Loire-Atlantique",
                    "49" => "Maine-et-Loire",
                    "53" => "Mayenne",
                    "72" => "Sarthe",
                    "85" => "Vendée",
                )
            ),
            array(
                'label' => 'Picardie', 
                'options' => array(
                    "02" => "Aisne",
                    "60" => "Oise",
                    "80" => "Somme",
                )
            ),
            array(
                'label' => 'Poitou-Charentes', 
                'options' => array(
                    "16" => "Charente",
                    "17" => "Charente-Maritime",
                    "79" => "Deux-Sèvres",
                    "86" => "Vienne",
                )
            ),
            array(
                'label' => "Provence-Alpes-Côte d'Azur", 
                'options' => array(
                    "04" => "Alpes-de-Haute-Provence",
                    "05" => "Hautes-Alpes",
                    "06" => "Alpes-Maritimes",
                    "13" => "Bouches-du-Rhône",
                    "83" => "Var",
                    "84" => "Vaucluse",
                )
            ),
            array(
                'label' => 'La Réunion', 
                'options' => array(
                    "974" => "La Réunion",
                )
            ),
            array(
                'label' => 'Rhône-Alpes', 
                'options' => array(
                    "01" => "Ain",
                    "07" => "Ardèche",
                    "26" => "Drôme",
                    "38" => "Isère",
                    "42" => "Loire",
                    "69" => "Rhône",
                    "73" => "Savoie",
                    "74" => "Haute-Savoie",
                )
            ),
        );
    }
}
