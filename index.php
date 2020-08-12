<?php
require 'Yatzy.php';

$yatzy = new Yatzy;

$yatzy->rollDice();
$dice = join(', ', $yatzy->dice);
echo "Tärningar: {$dice}";
echo "<br>";

echo "Resultat: {$yatzy->getResults()}";
