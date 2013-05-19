<?php

/**
 * 
 * @author Remi THOMAS
 *  
 */

namespace RtExtends\Useful\Php;

class String{
    
    /**
     * Use sprintf with variable form array
     * 
     * Based on http://www.php.net/manual/fr/function.sprintf.php#94608
     * 
     * @todo Add throws exception
     * 
     * @param string $string
     * @param array $array 
     */
    public static function sprintfArray($string, $array){
        
        if(!is_array($array)){
            return $string;
        }
        
        $keys    = array_keys($array);
        $keysmap = array_flip($keys);
        $values  = array_values($array);

        while (preg_match('/%\(([a-zA-Z0-9_ -]+)\)/', $string, $m))
        {    
            if (!isset($keysmap[$m[1]]))
            {
                echo "No key $m[1]\n";
                return false;
            }

            $string = str_replace($m[0], '%' . ($keysmap[$m[1]] + 1) . '$', $string);
        }

        array_unshift($values, $string);
        return call_user_func_array('sprintf', $values);
    }
}