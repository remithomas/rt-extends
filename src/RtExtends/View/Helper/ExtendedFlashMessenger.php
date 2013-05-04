<?php

namespace RtExtends\View\Helper;

use Zend\View\Helper\AbstractHelper;
use Zend\Mvc\Controller\Plugin\FlashMessenger as FlashMessenger;

use RtExtends\Entity\FlashMessage,
    RtExtends\Entity\FlashMessageSub,
    RtExtends\Useful\Php\String;

class ExtendedFlashMessenger extends AbstractHelper{
    
    /**
     * @var FlashMessenger
     */
    protected $flashMessenger;
    
    
    public function setFlashMessenger(FlashMessenger $flashMessenger)
    {
        $this->flashMessenger = $flashMessenger;
    }
    
    /**
     *
     * @param type $includeCurrentMessages
     * @param type $forceClearMessages
     * @param type $attr
     * @return type 
     */
    public function __invoke($includeCurrentMessages = false, $forceClearMessages = true, $attr = array())
    {
        // init : messages
        $messages = "";
        
        // init : namespaces
        $namespaces = array(
            FlashMessenger::NAMESPACE_ERROR,
            FlashMessenger::NAMESPACE_SUCCESS,
            FlashMessenger::NAMESPACE_INFO,
            FlashMessenger::NAMESPACE_DEFAULT,
        );
        
        foreach ($namespaces as $namespace){
            $messages .= $this->renderNamespace($namespace, $includeCurrentMessages, $forceClearMessages, $attr);
        }  
        
        return $messages;
    }
    
    /**
     *
     * @param type $namespace
     * @param type $includeCurrentMessages
     * @param type $forceClearMessages
     * @param type $attr
     * @return type 
     */
    public function renderNamespace($namespace, $includeCurrentMessages = false, $forceClearMessages = true, $attr = array()){
        
        // init : messages
        $messagesHTML = "";
        
        $messages = $this->flashMessenger->getMessagesFromNamespace($namespace);
        if ($includeCurrentMessages) {
            $messages = (array_merge($messages, $this->flashMessenger->getCurrentMessagesFromNamespace($namespace)));
        }
        
        $messages = array_unique($messages);
        
        foreach ($messages as $message){
            $messagesHTML .= $this->renderMessage($message, $namespace, $attr);
        }
        
        // clear messages
        if($forceClearMessages){
            $this->flashMessenger->clearMessagesFromNamespace($namespace);
            if ($includeCurrentMessages) {
                $this->flashMessenger->clearCurrentMessagesFromNamespace($namespace);
            }
        }
        
        return $messagesHTML;
    }
    
    /**
     *
     * @param type $message
     * @param type $namespace
     * @param type $attr
     * @return string 
     */
    public function renderMessage($message, $namespace = null, $attr = array()){
        
        // init : html
        $html = "";
        
        // container : message
        $class = array(
            "flashmessage-container",
            "alert",
            "alert-".$namespace
        );
        if(array_key_exists("class", $attr)){
            if(array_key_exists("removeclass", $attr) && $attr['removeclass'] == true){
                $class = array($attr['class']);
            }else{
                $class = array_merge($class, array($attr['class']));
            }
            
        }
                
        $html .= sprintf("<div class='%s'>", implode(" ", $class));
            // title
            $html .= "<h4 class='flashmessage-container-title'>" . String::sprintfArray($this->view->translate($message->getTitle()), $message->getVartitle()) . "</h4>";
            // messages
            // container : messages
            $html .= "<div class='flasmessage-container-messages'>";
                if(is_array($message->getMessages())){
                    foreach ($message->getMessages() as $submessage){
                        if($submessage instanceof FlashMessageSub){
                            $html .= $this->renderSubMessage($submessage->getMessage(), $submessage->getVariables());
                        }
                    }
                }else if(is_string($message->getMessages())){
                    $html .= $this->renderSubMessage($message->getMessages());
                }
            $html .= "</div>";
            
        $html .= "</div>";
        
        return $html;
    }
    
    public function renderSubMessage($message, $variables = array()){
        // init : html
        $html = "";
       
        // container : messages
        $html .= "<div class='flasmessage-container-submessage'>";
        $html .= String::sprintfArray($this->view->translate($message), $variables);
        $html .= "</div>";
       
        return $html;
    }
}