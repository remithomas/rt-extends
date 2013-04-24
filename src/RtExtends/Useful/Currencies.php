<?php

/**
 * Useful : currency
 * 
 * Base on http://fxtop.com/fr/liste-pays-devises.php
 * 
 * @author Remi THOMAS
 * @file
 * 
 *  
 */

namespace RtExtends\Useful;

class Currencies{
    
    /**
     * Get all code currencies
     * @return array 
     */
    public static function getAllCodeCurrencies(){
        return array_keys(self::getAllSymbolCurrencies());
    }
    
    /**
     *
     * @todo finish code
     * 
     * @return array 
     */
    public static function getAllCountriesCurrencies(){
        return array(
            'country'=>"currency"
        );
    }
    
    /**
     * Get all symbol currencies
     * @return array 
     */
    public static function getAllSymbolCurrencies(){
        
        // code on http://finance.yahoo.com/currency-converter/#from=USD;to=KES;amt=1
        
        return array(
            "AFN" => "", // Afghanistan         Asie            AFN
            "ZAR" => "", // Afrique du Sud	Afrique         ZAR
            "ALL" => "ALL", // Albanie             Europe de l'est	ALL
            "DZD" => "", // Algérie             Afrique	DZD
            "EUR" => "€", // europe
            "AOA" => "", // Angola	Afrique	AOA
            "XCD" => "", // Anguilla	Antilles, caraïbes
            "ANG" => "", // Antilles néerlandaises	Antilles, caraïbes	ANG
            "SAR" => "", // Arabie Saoudite	Moyen orient	SAR
            "ARS" => "", // Argentine	Amérique du Sud et centrale	ARS
            "AMD" => "", // Arménie	Europe de l'est	AMD
            "AWG" => "", // Aruba	Antilles, caraïbes	AWG
            "AUD" => "", // Australie	Pacifique	AUD
            "AZN" => "", // Azerbaïdjan	Europe de l'est	AZN
            "BSD" => "", // Bahamas	Antilles, caraïbes	BSD
            "BHD" => "", // Bahrein	Moyen orient	BHD
            "BDT" => "", // Bangladesh	Asie	BDT
            "BBD" => "", // Barbade	Antilles, caraïbes	BBD
            "BZD" => "", // Belize	Antilles, caraïbes	BZD
            "XOF" => "", // Bénin	Afrique	XOF
            "BMD" => "", // Bermudes	Antilles, caraïbes	BMD
            "BTN" => "", // Bhoutan	Asie	BTN
            "MMK" => "", // Birmanie	Asie	MMK
            "BOB" => "", // Bolivie	Amérique du Sud et centrale	BOB
            "BWP" => "", // Botswana	Afrique	BWP
            "BRL" => "", // Brésil	Amérique du Sud et centrale	BRL
            "BND" => "", // Brunei Darussalam	Moyen orient	BND
            "BIF" => "", // Burundi	Afrique	BIF	
            "KHR" => "", // Cambodge	Asie	KHR
            "XAF" => "", // Cameroun	Afrique	XAF
            "CAD" => "C$", // Canada	Amérique du Nord	CAD	
            "CVE" => "", // Cap Vert	Afrique	CVE
            "KYD" => "", // Cayman	Antilles, caraïbes	KYD
            "XAF" => "", // Centre-Afrique	Afrique	XAF
            "CLP" => "", // Chili	Amérique du Sud et centrale	CLP
            "CNY" => "", // Chine	Asie	CNY
            "COP" => "", // Colombie	Amérique du Sud et centrale	COP
            "KMF" => "", // Comores	Afrique	KMF
            "KPW" => "", // Corée du Nord	Asie	KPW
            "CRC" => "", // Costa Rica	Amérique du Sud et centrale	CRC
            "HRK" => "", // Croatie	Europe de l'est	HRK
            "CUC" => "", // Cuba	Antilles, caraïbes	CUC
            "DKK" => "", // Danemark	Europe occidentale	DKK
            "USD" => "$", // Etats-Unis	Amérique du Nord	USD
            "DJF" => "", // Djibouti	Afrique	DJF
            "XCD" => "", // Dominique	Antilles, caraïbes	XCD
            "EGP" => "", // Egypte	Moyen orient	EGP
            "AED" => "", // Emirats Arabes unis	Moyen orient	AED
            "ERN" => "", // Erythrée	Moyen orient	ERN
            "ETB" => "", // Ethiopie	Afrique	ETB
            "RUB" => "", // ex-Union Soviétique	Europe de l'est	RUB
            "YUN" => "", // ex-Yougoslavie	Europe de l'est	YUN
            "FKP" => "", // Falkland	Antarctique	FKP
            "FJD" => "", // Fidji	Pacifique	FJD
            "GMD" => "", // Gambie	Afrique	GMD
            "GEL" => "", // Géorgie	Europe de l'est	GEL
            "GHS" => "", // Ghana	Afrique	GHS
            "GIP" => "", // Gibraltar	Europe occidentale	GIP
            "GBP" => "£", // Grande-Bretagne	Europe occidentale	GBP
            "XCD" => "", // Grenade	Antilles, caraïbes	XCD
            "GTQ" => "", // Guatemala	Amérique du Sud et centrale	GTQ
            "GNF" => "", // Guinée	Afrique	GNF
            "GYD" => "", // Guyane	Amérique du Sud et centrale	GYD
            "HTG" => "", // Haïti	Antilles, caraïbes	HTG
            "HNL" => "", // Honduras	Amérique du Sud et centrale	HNL
            "HKD" => "", // Hong Kong	Asie	HKD
            "HUF" => "", // Hongrie	Europe de l'est	HUF
            "MUR" => "", // Ile Maurice	Afrique	MUR
            "NOK" => "", // Iles Bouvet	Antarctique	NOK
            "NZD" => "", // Iles Cook	Pacifique	NZD
            "" => "", // Iles Salomon	Pacifique	SBD
            "" => "", // Inde	Asie	INR
            "" => "", // Indonésie	Asie	IDR
            "" => "", // Irak	Moyen orient	IQD
            "" => "", // Iran	Moyen orient	IRR
            "" => "", // Islande	Europe occidentale	ISK
            "" => "", // Israël	Moyen orient	ILS
            "" => "", // Jamaïque	Antilles, caraïbes	JMD
            "" => "", // Japon	Asie	JPY
            "" => "", // Jordanie	Moyen orient	JOD
            "" => "", // Kazakhstan	Asie	KZT
            "" => "", // Kenya	Afrique	KES
            "" => "", // Kirghizistan	Asie	KGS
            "" => "", // Koweït	Moyen orient	KWD
            "" => "", // Laos	Asie	LAK
            "" => "", // Lesotho	Afrique	LSL
            "" => "", // Lettonie	Europe de l'est	LVL
            "" => "", // Liban	Moyen orient	LBP
            "" => "", // Libéria	Afrique	LRD
            "" => "", // Libye	Afrique	LYD
            "" => "", // Liechtenstein	Europe occidentale	CHF
            "" => "", // Lituanie	Europe de l'est	LTL
            "" => "", // Macao	Asie	MOP
            "" => "", // Madagascar	Afrique	MGA
            "" => "", // Malaisie	Asie	MYR
            "" => "", // Malawi	Afrique	MWK
            "" => "", // Maldives	Asie	MVR
            "" => "", // Maroc	Afrique	MAD
            "" => "", // Mauritanie	Afrique	MRO
            "" => "", // Mexice	Amérique du Sud et centrale	MXN
            "" => "", // Moldavie	Europe occidentale	MDL
            "" => "", // Mongolie	Asie	MNT
            "" => "", // Montserrat	Antilles, caraïbes	XCD
            "" => "", // Mozambique	Afrique	MZN
            "" => "", // Namibie	Afrique	NAD
            "" => "", // Népal	Asie	NPR
            "" => "", // Nicaragua	Amérique du Sud et centrale	NIO
            "" => "", // Nigéria	Afrique	NGN
            "" => "", // Norvège	Europe occidentale	NOK
            "" => "", // Nouvelle Calédonie	Pacifique	XPF
            "" => "", // Oman	Moyen orient	OMR
            "" => "", // Ouganda	Afrique	UGX
            "" => "", // Ouzbékistan	Asie	UZS
            "" => "", // Pakistan	Asie	PKR
            "" => "", // Panama	Pacifique	PAB
            "" => "", // Papouasie Nouvelle Guinée	Asie	PGK
            "" => "", // Paraguay	Amérique du Sud et centrale	PYG
            "" => "", // Pérou	Amérique du Sud et centrale	PEN
            "" => "", // Philippines	Asie	PHP
            "" => "", // Plogne	Europe de l'est	PLN
            "" => "", // Polynésie française	Pacifique	XPF
            "" => "", // Qatar	Moyen orient	QAR
            "" => "", // République de Macédoine	Europe de l'est	MKD
            "" => "", // République dominicaine	Antilles, caraïbes	DOP
            "" => "", // République Tchèque	Europe de l'est	CZK
            "" => "", // Roumanie	Europe de l'est	RON
            "" => "", // Russie	Europe de l'est	RUB
            "" => "", // Rwanda	Afrique	RWF
            "" => "", // Sahara occidental	Afrique	ESP
            "" => "", // Sahara occidental	Afrique	MAD
            "" => "", // Sahara occidental	Afrique	MRO
            "" => "", // Saint Kitts et Nevis	Antilles, caraïbes	XCD
            "" => "", // Saint Tomé et Principe	Afrique	STD
            "" => "", // Saint Vincent et Grenadines	Antilles, caraïbes	XCD
            "" => "", // Samoa occidental	Pacifique	WST
            "" => "", // Sainte Hélène	Afrique	SHP
            "" => "", // Seychelles	Afrique	SCR
            "" => "", // Sierra Leone	Afrique	SLL
            "" => "", // Singapour	Asie	SGD
            "" => "", // Somalie	Afrique	SOS
            "" => "", // Soudan	Afrique	SDG
            "" => "", // Sri Lanka	Asie	LKR
            "" => "", // Suède	Europe occidentale	SEK
            "" => "", // Suriname	Amérique du Sud et centrale	SRD
            "" => "", // Swaziland	Afrique	SZL
            "" => "", // Syrie	Moyen orient	SYP
            "" => "", // Taïwan	Asie	TWD
            "" => "", // Tanzanie	Afrique	TZS
            "" => "", // Thaïlande	Asie	THB
            "" => "", // Timor oriental	Asie	IDR
            "" => "", // Tonga	Pacifique	TOP
            "" => "", // Trinité et Tobago	Antilles, caraïbes	TTD
            "" => "", // Tunisie	Afrique	TND
            "" => "", // Turkménistan	Asie	TMT
            "" => "", // Turquie	Europe de l'est	TRY
            "" => "", // Ukraine	Europe de l'est	UAH
            "" => "", // Uruguay	Amérique du Sud et centrale	UYU
            "" => "", // Vanuatu	Pacifique	VUV
            "" => "", // Vénézuela	Amérique du Sud et centrale	VEF
            "" => "", // Vietnam	Asie	VND
            "" => "", // Wallis et Futuna	Pacifique	XPF
            "" => "", // Yemen	Moyen orient	YER
            "" => "", // Zaïre (République Démocratique du Congo)	Afrique	CDF
            "" => "", // Zambie	Afrique	ZMK
        );
    }
    
    /**
     *
     * @todo use an API to display conversion
     * 
     * @param float $amount
     * @param string $curency
     * @param string $toCurrency 
     * @return float
     */
    public static function convert($amount, $curency, $toCurrency){
        
    }
}
?>
