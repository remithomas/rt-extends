<?php
/**
 * 
 * @author Remi THOMAS
 */
namespace RtExtends\View\Helper;

use Zend\View\Helper\AbstractHelper;

/**
 * ExtendedFlashMessenger helper class
 */
class BodyClasses extends AbstractHelper{
    
    protected $bodyClassesPlugin;


    /**
     * 
     * @return \RtExtends\View\Helper\BodyClasses
     */
    public function __invoke()
    {
        return $this;
    }
    
    /**
     * 
     * @param \RtExtends\Controller\Plugin\BodyClasses $plugin
     * @return \RtExtends\View\Helper\BodyClasses
     */
    public function setBodyClassesPlugin(\RtExtends\Controller\Plugin\BodyClasses $plugin){
        $this->bodyClassesPlugin = $plugin;
        return $this;
    }
    
    /**
     * 
     * @return string
     */
    public function render(){
        $classes = $this->bodyClassesPlugin->getClasses();
        return implode(" ", $classes);
    }
    
}