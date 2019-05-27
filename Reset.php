<?php
session_start();
/*
 * Author     : Girish Lokapure (lokapure.girish at gmail.com)
 * Description: Framegame
 */
require_once 'game/config/config.php';

class Reset {

    static function resetGame() {        
        unlink("game/".CACHE_ELEMENTS);
        unlink("game/".CACHE_ELEMENTS_LIFE);
        unlink("game/".CACHE_ROUNDS);        
        unset($_SESSION['userid']);
        
    }

}

Reset::resetGame();
