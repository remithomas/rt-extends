<?php

/**
 * 
 * @author Remi THOMAS
 * 
 */

namespace RtExtends;

use Zend\EventManager\Event;

class Module {
    
    /**
     * onBootstrap
     * @param MvcEvent $e
     */
    public function onBootstrap(Event $e){
  
    }
    
    /**
     * Return Autoloader configuration
     * @return array 
     */
    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\ClassMapAutoloader' => array(
                __DIR__ . '/autoload_classmap.php',
            ),
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }
    
    /**
     * Return module configuration
     * @return array 
     */
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }
    
}
