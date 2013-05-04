<?php

namespace RtExtends\Entity;

class FlashMessageSub{
    
    /**
     * Message (sub)
     * @var string 
     */
    protected $message;
    
    /**
     * List of variables
     * @var array 
     */
    protected $variables;
    
    /**
     * Set message
     * @param string $message
     * @return \RtExtends\Entity\FlashMessageSub 
     */
    public function setMessage($message){
        $this->message = $message;
        return $this;
    }
    
    /**
     * Get message
     * @return string 
     */
    public function getMessage(){
        return $this->message;
    }
    
    /**
     * set variable
     * @param array $variables
     * @return \RtExtends\Entity\FlashMessageSub 
     */
    public function setVariables(array $variables){
        $this->variables = $variables;
        return $this;
    }
    
    /**
     * Get variables
     * @return array 
     */
    public function getVariables(){
        return $this->variables;
    }
}