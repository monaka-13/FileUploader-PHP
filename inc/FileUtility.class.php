<?php

// Implement the write() function for the file writing functionality
class FileUtility {

    static $currentFile = '';
    
    static function initialize($fileName){
        self::$currentFile = $fileName;
    }

    static function open($mode){
        if(file_exists(self::$currentFile)){
            $fh = fopen(self::$currentFile, $mode);
            return $fh;
        }
        else{
            echo "The file does not exist";
            return false;
        }  
    }

    static function close($fh){
        fclose($fh);
    }

    static function read()    {

        $contents = null;
        try {
            if($fh=self::open('r')){                
                $contents = fread($fh,filesize(self::$currentFile));
                self::close($fh);
            }
            else {
                throw new Exception("Couldn't open file $fh");
            }
        } catch (Exception $fe)  {
            Page::$notifications[] = array($fe->getMessage());            
        }
       
        return $contents;
    }

    // Implement the file append operation with try-catch and file lock
    // The $data is the string from OrderList's parseWrite() function   
    // Make sure to update Page class's notification and error log accordingly
    static function write($data)    {
        
        
        
    }


    
}

?>