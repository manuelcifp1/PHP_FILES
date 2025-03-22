<?php

$numbers = [95, 80, 60, 75, 90, 30, 5, 13, 25];

usort($numbers, function($a, $b) {
    return $a <=> $b;
});

print_r($numbers);
/*Esto le dice a usort():

Si $a < $b, devuelve -1 → $a va antes que $b

Si $a > $b, devuelve 1 → $a va después que $b

Si son iguales, no cambia el orden */