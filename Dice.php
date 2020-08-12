<?php

class Dice {
    public $result;

    public function __construct() {
        $this->result = rand(1,6);
    }
}
