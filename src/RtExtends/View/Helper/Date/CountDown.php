<?php
/**
 * CountDown helper class
 * 
 * @author Remi THOMAS
 */
namespace RtExtends\View\Helper\Date;

use Zend\View\Helper\AbstractHelper;

/**
 * ExtendedFlashMessenger helper class
 */
class CountDown extends AbstractHelper{
    
    /**
     * Render
     * @param bool $includeCurrentMessages
     * @param bool $forceClearMessages
     * @param array $attr
     * @return string 
     */
    public function __invoke($eventEnds, $currentTime = null, $toArray = false)
    {
        if(is_null($currentTime)){
            $currentTime = time();
        }
        
        $diff = $eventEnds - $currentTime; 
        $days=floor($diff/3600/24); 
        $hours=floor(($diff-$days*3600*24)/3600); 
        $mins=floor(($diff-$days*3600*24-$hours*3600)/60); 
        $seconds=$diff-$days*3600*24-$hours*3600-$mins*60;  
        
        if($toArray){
            return array(
                'days' => $days,
                'hours' => $hours,
                'minutes' => $mins,
                'seconds' => $seconds
            );
        }else{
            return $days ."d ". $hours."h ".$mins."m ".$seconds."s";
        }
    }
    
}