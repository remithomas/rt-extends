<?php

namespace RtExtends\Uri;

use Zend\Uri\Uri;

class MetaData extends Uri{
    
    public function getMetaData($uri){
        
        $validator = new \Zend\Validator\Uri(array(
            'allowRelative' => false
        ));
        
        if ($validator->isValid($uri)) {
            $return = array(
                'title' => $uri,
                'description' => ''
            );
            
            $metaData = array_merge(array(), get_meta_tags($uri));
            
            
            if(!key_exists('title', $metaData)){
                $ch = curl_init();

                curl_setopt($ch, CURLOPT_HEADER, 0);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_URL, $uri);
                curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);

                $data = curl_exec($ch);
                curl_close($ch);

                $doc = new \DOMDocument();
                @$doc->loadHTML($data);
                $nodes = $doc->getElementsByTagName('title');

                if(isset($nodes->item(0)->nodeValue)){
                    $metaData['title'] = $nodes->item(0)->nodeValue;
                }
            }
            
            return array_merge($return, $metaData);
            
        }else{
            return false;
        }
        
    }
}