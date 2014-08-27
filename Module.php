<?php

/**
 * Module file
 * 
 * Zend Framework 2 module file
 * 
 * @author Remi THOMAS
 * 
 */

namespace RtExtends;

use Zend\EventManager\Event;

/**
 * Module class
 */
class Module {
    
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
    
    /**
     * Return View helper config
     * @return array 
     */
    public function getViewHelperConfig()
    {
        return array(
            'factories' => array(
                'extendedFlashMessenger' => function($sm) {
                    $flashmessenger = $sm->getServiceLocator()
                        ->get('ControllerPluginManager')
                        ->get('flashmessenger');
 
                    $messages = new \RtExtends\View\Helper\ExtendedFlashMessenger();
                    $messages->setFlashMessenger($flashmessenger);
 
                    return $messages;
                },
                'rtFlashMessenger' => function($sm) {
                    $flashmessenger = $sm->getServiceLocator()
                        ->get('ControllerPluginManager')
                        ->get('flashmessenger');
 
                    $messages = new \RtExtends\View\Helper\ExtendedFlashMessenger();
                    $messages->setFlashMessenger($flashmessenger);
 
                    return $messages;
                },
                'rtCountDown' => function($sm) {
                    return new \RtExtends\View\Helper\Date\CountDown();
                },
                'rtBodyClasses' => function($sm) {
                    $viewHelper = new \RtExtends\View\Helper\BodyClasses();
                    $plugin = $sm->getServiceLocator()->get('ControllerPluginManager')->get("BodyClasses");
                    //var_dump($plugin);die("test");
                    $viewHelper->setBodyClassesPlugin($plugin);
                    return $viewHelper;
                }
            ),
        );
    }
    
}
