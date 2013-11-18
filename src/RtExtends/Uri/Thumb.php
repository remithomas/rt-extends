<?php

namespace RtExtends\Uri;

use Zend\Uri\Uri;

class Thumb extends Uri{
    
    
    /**
     * Get a list of thumbs from a URI
     * @param string $uri
     * @param integer $limit
     * @return array
     */
    public function getThumbs($uri, $limit = 5){
        $parseInfo = parent::parse($uri);
        $return = array();
        
        switch ($parseInfo->host){
            // Youtube.com
            case "www.youtube.com":
                $queryArray = array();
                parse_str($parseInfo->query, $queryArray);
                $return = array(
                    "http://img.youtube.com/vi/" . $queryArray['v'] . "/0.jpg",
                    "http://img.youtube.com/vi/" . $queryArray['v'] . "/1.jpg",
                    "http://img.youtube.com/vi/" . $queryArray['v'] . "/2.jpg",
                    "http://img.youtube.com/vi/" . $queryArray['v'] . "/3.jpg"
                );
                break;
            
            // Dailymotion.com
            case "www.dailymotion.com":
                $return = array(
                    'http://www.dailymotion.com/thumbnail'. $parseInfo->path
                );
                break;
            
            // Vimeo.com
            case "vimeo.com":
                $id = str_replace("/", "", $parseInfo->path);
                $data = \Zend\Json\Json::decode(file_get_contents("http://vimeo.com/api/v2/video/$id.json"));
                $return = array(
                    $data[0]->thumbnail_medium
                );
                break;
            
            // others webpage
            default:
                
                /**
                 * Credit to http://www.bitrepository.com
                 * http://www.bitrepository.com/extract-images-from-an-url.html
                 */
                
                // Fetch page
                $string = $this->fetchPage($uri);
                $out = array();
                
                // Regex for SRC Value
                $image_regex_src_url = '/<img[^>]*'. 'src=[\"|\'](.*)[\"|\']/Ui';
                preg_match_all($image_regex_src_url, $string, $out, PREG_PATTERN_ORDER);

                $return = $out[1];
                
                for ($i=0 ; $i<count($return) ; $i++){
                    $tUri = new Uri();
                    $parseInfoThumb = $tUri->parse($return[$i]);
                    if(!$parseInfoThumb->isAbsolute()){
                        $return[$i] = $parseInfo->scheme . "://" . $parseInfo->host . "" . $return[$i];
                    }
                }
        }

        // check && return
        return array_slice($return, 0, $limit);
    }
    
    /**
     * Get one thumb from an URI
     * @param string $uri
     * @return string
     */
    public function getThumb($uri){
        $thumbs = $this->getThumbs($uri, 1);
        if(count($thumbs) == 0){
            return "";
        }else{
            return $thumbs[0];
        }
    }
    
    
    protected function fetchPage($path){
        $file = fopen($path, "r"); 

        if (!$file){
            exit("The was a connection error!");
        } 

        $data = '';

        while (!feof($file)){
            // Extract the data from the file / url
            $data .= fgets($file, 1024);
        }
        
        return $data;
    }
}