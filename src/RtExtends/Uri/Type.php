<?php

namespace RtExtends\Uri;

use Zend\Uri\Uri;

class Type extends Uri{
    
    const TYPE_WEBPAGE = "webpage";
    const TYPE_VIDEO_YOUTUBE = "videoyoutube";
    const TYPE_VIDEO_DAILYMOTION = "videodailymotion";
    const TYPE_VIDEO_VIMEO = "videovimeo";
    const TYPE_IMAGE = "image";
    const TYPE_SWF = "swf";
    const TYPE_FACEBOOK = "facebook";
    const TYPE_TWITTER = "twitter";
    
    /**
     * 
     * @param string $uri
     * @return string
     */
    public function getType($uri){
        $validator = new \Zend\Validator\Uri(array(
            'allowRelative' => false
        ));
        
        if ($validator->isValid($uri)) {
            $parseInfo = parent::parse($uri);
            
            switch ($parseInfo->host){
                // Youtube.com
                case "www.youtube.com":
                    $queryArray = array();
                    parse_str($parseInfo->query, $queryArray);
                    if(isset($queryArray['v'])){
                        return self::TYPE_VIDEO_YOUTUBE;
                    }
                    break;
                    
                // Dailymotion.com
                case "www.dailymotion.com":
                    if(strpos($parseInfo->path, "/video") !== false){
                        return self::TYPE_VIDEO_DAILYMOTION;
                    }
                    break;
                    
                    // Vimeo.com
                case "vimeo.com":
                    if(is_int($parseInfo->path)){
                         return self::TYPE_VIDEO_VIMEO;
                    }
                    break;
            }
            
            $ch = curl_init(); 
            curl_setopt($ch, CURLOPT_URL, $uri); 
            curl_setopt($ch, CURLOPT_HEADER, TRUE); 
            curl_setopt($ch, CURLOPT_NOBODY, TRUE); // remove body 
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE); 
            $head = curl_exec($ch); 
            
            $contentType = curl_getinfo($ch, CURLINFO_CONTENT_TYPE);
            curl_close($ch); 
            
            if(strpos($contentType, "image") !== false){
                return self::TYPE_IMAGE;
            }else if($contentType == "application/x-shockwave-flash"){
                return self::TYPE_SWF;
            }
            
            return self::TYPE_WEBPAGE;
            
        }else{
           return "";
        }
    }
}