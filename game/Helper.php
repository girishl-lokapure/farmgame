<?php

/*
 * Author     : Girish Lokapure (lokapure.girish at gmail.com)
 * Description: Framegame
 */

class Helper {

    static function writeTofile($file, $data) {
        $fp = fopen($file, 'w');
        fwrite($fp, json_encode($data));
        fclose($fp);
    }
    
    static function readFromfile($file) {
        return json_decode(
                file_get_contents($file), true
        );
    }

}
