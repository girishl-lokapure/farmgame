<?php

/*
 * Author     : Girish Lokapure (lokapure.girish at gmail.com)
 * Description: Framegame
 */

class Farmer extends FarmElements {

    public $chosen_one;

    function __construct($chosen_one) {
        $this->chosen_one = $chosen_one;
    }

    function feedChoosenOne() {
        //reset counter
        $this->elements_life = Helper::readFromfile(CACHE_ELEMENTS_LIFE);
        $this->elements_life[$this->chosen_one] = constant(strtoupper(__CLASS__) . '_FEED INTERVAL');
        Helper::writeTofile(CACHE_ELEMENTS_LIFE, $this->elements_life);
        

        //see who has starved to death
        $this->hasStarvedToDeath();
    }

}
