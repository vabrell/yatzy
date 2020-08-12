<?php
require 'Dice.php';

class Yatzy {
    public $dice = [];
    private $straights = [
        'Liten stege' => [1,2,3,4,5],
        'Stor stege' => [2,3,4,5,6],
    ];
    private $pairs = [
        1 => 'Par',
        2 => 'Två par',
    ];

    public function rollDice() {
        $this->dice = [];

        for($i=0; $i < 5; $i++) {
            $dice = new Dice;
            $this->dice[] = $dice->result;
        }
    }

    public function getResults() {
        $results = [];
        foreach ($this->dice as $die) {
            !isset($results[$die])
                ? $results[$die] = 1
                : $results[$die]++;
        }
        sort($results);
        $count = count($results);
        $values = array_values($results);

        if ($count === 1) return 'YATZY';
        if ($count === 2 && $values[0] === 2) return 'Kåk';
        
        foreach ($this->straights as $key => $straight) {
            if (count(array_diff($straight, $this->dice)) === 0) {
                return $key;
            }
        }

        $pairs = count(array_filter($results, function($res) {
            return $res === 2;
        }));

        if ($pairs > 0) return $this->pairs[$pairs];

        foreach ($results as $res) {
            if ($res === 3) return 'Triss';
            if ($res === 4) return 'Fyrtal';
        }

    }
}
