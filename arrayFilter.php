<?php

// Fonction de rappel pour filtrer les éléments inférieurs à 5
function filterCallback($value) {
    return $value < 5;
}

$array = [2, 8, 4, 3, 6];
$filteredArray = array_filter($array, 'filterCallback');

//print_r($filteredArray);


$entry = [
    0 => 'foo',
    1 => false,
    2 => -1,
    3 => null,
    4 => '',
    5 => '0',
    6 => 0,
];


print_r(array_filter($entry));