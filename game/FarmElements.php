<?php

/*
 * Author     : Girish Lokapure (lokapure.girish at gmail.com)
 * Description: Framegame
 */
require_once 'Helper.php';

abstract class FarmElements {

    private $elements_life, $elements_array;

    abstract function feedChoosenOne();

    function hasStarvedToDeath() {
        $this->elements_life = Helper::readFromfile(CACHE_ELEMENTS_LIFE);

        foreach ($this->elements_life as $key => &$value) {
            if ($key !== $this->chosen_one && $value > 0) {
                $value = $value - 1;
                if ($value == 0) {
                    $this->unsetFarmElement($key);
                }
            }
        }
        Helper::writeTofile(CACHE_ELEMENTS_LIFE, $this->elements_life);
    }

    function unsetFarmElement($element) {
        $this->elements_array = Helper::readFromfile(CACHE_ELEMENTS);

        foreach ($this->elements_array as $key => &$value) {
            foreach ($value as $k => &$v) {
                if ($v == $element) {
                    unset($value[$k]);
                    $value = array_values($value); //to reset keys
                }
            }
        }
        Helper::writeTofile(CACHE_ELEMENTS, $this->elements_array);
    }

}
