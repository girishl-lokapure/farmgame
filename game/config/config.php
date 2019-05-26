<?php

/*
 * Author     : Girish Lokapure (lokapure.girish at gmail.com)
 * Description: Framegame
 */

define('TOTAL_ROUNDS', 50);
define('FARMER_FEED INTERVAL', 15);
define('COW_FEED INTERVAL', 10);
define('BUNNY_FEED INTERVAL', 8);

define('FARM_ELEMENTS_ARRAY', serialize([
    'farmer' => array('farmer1'),
    'cow' => array('cow1', 'cow2'),
    'bunny' => array('bunny1', 'bunny2', 'bunny3', 'bunny4')
]));


//cache params
define('CACHE_ELEMENTS', 'cache/elements.json');
define('CACHE_ELEMENTS_LIFE', 'cache/life.json');
define('CACHE_ROUNDS', 'cache/round.json');
