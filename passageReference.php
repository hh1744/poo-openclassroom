<?php

function getValue(&$val)
{
    $val += 5;
}

$val = 120;
getValue($val);
var_dump($val);  // Affichera 125
