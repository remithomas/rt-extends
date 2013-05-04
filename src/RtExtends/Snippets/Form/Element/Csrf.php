<?php

namespace RtExtends\Snippets\Form\Element;

class Csrf{
    
    /**
     * Create CSRF
     * @param string $name
     * @param integer $timeout
     * @return array 
     */
    public static function getCreateElementArray($name, $timeout = 600){
        return array(
            'type' => 'Zend\Form\Element\Csrf',
            'name' => $name,
            'options' => array(
                'csrf_options' => array(
                    'timeout' => $timeout
                )
            )
        );
    }
}