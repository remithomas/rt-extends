<?php

/**
 * Zip tool
 * 
 * Base on http://webdeveloperplus.com/php/21-really-useful-handy-php-code-snippets/ 
 * Credits : http://davidwalsh.name/create-zip-php
 * 
 * @example
 * $files=array('file1.jpg', 'file2.jpg', 'file3.gif');  
 * Zip::createZip($files, 'myzipfile.zip', true);  
 * 
 * @author Remi THOMAS
 *  
 */

namespace RtExtends\Useful\File;

use ZipArchive;

class Zip {
    
    /**
     *
     * @param array $files
     * @param string|null $destination
     * @param bool $overwrite
     * @return boolean 
     */
    public static function createZip($files = array(),$destination = '',$overwrite = false){
        
        if(!is_array($files)){
            $files = array($files);
        }
        
        //if the zip file already exists and overwrite is false, return false  
        if(file_exists($destination) && !$overwrite) {return false; }  
        
        //vars  
        $valid_files = array();  
        //if files were passed in...  
        if(is_array($files)) {  
            //cycle through each file  
            foreach($files as $file) {  
                //make sure the file exists  
                if(file_exists($file)) {  
                    $valid_files[] = $file;  
                }  
            }  
        }  
        
        //if we have good files...  
        if(count($valid_files)) {  
            //create the archive  
            $zip = new ZipArchive();  
            if($zip->open($destination,$overwrite ? ZIPARCHIVE::OVERWRITE : ZIPARCHIVE::CREATE) !== true) {  
                return false;  
            }  
            //add the files  
            foreach($valid_files as $file) {  
                $zip->addFile($file,$file);  
            }  
            //debug  
            //echo 'The zip archive contains ',$zip->numFiles,' files with a status of ',$zip->status;  

            //close the zip -- done!  
            $zip->close();  

            //check to make sure the file exists  
            return file_exists($destination);  
        } else {  
            return false;  
        }  
    }
    
    /**
     *
     * @param string $file path to zip file 
     * @param string $destination destination directory for unzipped files 
     * @return boolean 
     */
    public static function unzip($file, $destination){
        // create object  
        $zip = new ZipArchive() ;  
        // open archive  
        if ($zip->open($file) !== TRUE) {  
            die ("Could not open archive");  
        }
    
        // extract contents to destination directory  
        $zip->extractTo($destination);  
        // close archive  
        $zip->close();  
        return true;
    }
    
}