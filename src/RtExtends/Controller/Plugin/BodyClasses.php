<?php

/**
 * @author Remi THOMAS 
 */

namespace RtExtends\Controller\Plugin;
 
use Zend\Mvc\Controller\Plugin\AbstractPlugin;
 
class BodyClasses extends AbstractPlugin{
    
    /**
     * Classes CSS
     * @var array 
     */
    protected $classes;

    /**
     * Constructor
     * Set a Placeholder container 
     */
    public function __construct(){
        $this->classes = array();
    }
    
    /**
     * 
     * @return \RtExtends\Controller\Plugin\BodyClasses
     */
    public function __invoke()
    {
        return $this;
    }
    
    /**
     * 
     * @return array
     */
    public function getClasses(){
        return array_unique($this->classes);
    }
    
    /**
     * 
     * @param type $classes
     * @return \RtExtends\Controller\Plugin\BodyClasses
     */
    public function addClass($classes){
        if(is_string($classes)){
            array_push($this->classes, $classes);
        }else if(is_array($classes)){
            $this->classes = array_merge($this->classes, $classes);
        }
        
        return $this;
    }
    
}