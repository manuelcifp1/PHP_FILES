<?php

$numA = 3;
$numB = 24;
$impares = array();

for ($i = $numA + 1; $i < $numB; $i++) {
    if(($i % 2) != 0) {
        $impares[]= $i;
    }
}

for ($i = 0; $i < (count($impares)); $i++) {
    echo $impares[$i] . "\n";
}