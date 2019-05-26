<?php

/*
 * Author     : Girish Lokapure (lokapure.girish at gmail.com)
 * Description: Framegame
 */
require_once 'config/config.php';
foreach (glob("*.php") as $file) {
    require_once $file;
}

class Feed {

    private $farm_elements_array,
            $chosen_one,
            $element,
            $round;

    function main() {

        $round_data = [];
        //set up cache
        $this->_getCachedElements();

        //determine whom to feed
        if ($this->_whomToFeed()) {
            // feed the choosen one and determine who starved to death
            if (file_exists(CACHE_ROUNDS)) {
                $round_data = Helper::readFromfile(CACHE_ROUNDS);
            }
            $this->round = count($round_data) + 1;
            $round_data [] = [
                'round' => $this->round,
                'element' => $this->chosen_one];

            Helper::writeTofile(CACHE_ROUNDS, $round_data);


            $obj = new $this->element($this->chosen_one);
            $obj->feedChoosenOne();
            $result = json_encode($round_data);
            if (count($round_data) >= TOTAL_ROUNDS) {
                $str = "win";
                $result = json_encode([$str]);
            }
        } else {
            $str = 'lost';
            $result = json_encode([$str]);
        }

        echo $result;
    }

    function _getCachedElements() {
        if (file_exists(CACHE_ELEMENTS)) {
            $this->farm_elements_array = json_decode(file_get_contents(CACHE_ELEMENTS), true);
        } else {
            $this->farm_elements_array = unserialize(FARM_ELEMENTS_ARRAY);

            Helper::writeTofile(CACHE_ELEMENTS, $this->farm_elements_array);
            $this->_setCacheElements();
        }
    }

    function _whomToFeed() {
        //check if a group had died
        foreach ($this->farm_elements_array as $key => $value) {
            if (empty($this->farm_elements_array[$key])) {
                return false;
            }
        }

        //select random
        $this->element = array_rand($this->farm_elements_array);

        if (!empty($this->farm_elements_array[$this->element])) {
            $i = array_rand($this->farm_elements_array[$this->element]);
            $this->chosen_one = $this->farm_elements_array[$this->element][$i];
            return true;
        } else {
            return false;
        }
    }

    function _setCacheElements() {
        if (!file_exists(CACHE_ELEMENTS_LIFE)) {
            foreach ($this->farm_elements_array as $key => $value) {
                foreach ($value as $v) {
                    $life[$v] = constant(strtoupper($key) . '_FEED INTERVAL');
                }
            }
            Helper::writeTofile(CACHE_ELEMENTS_LIFE, $life);
        }
    }

}

$feed = new Feed();
$feed->main();
