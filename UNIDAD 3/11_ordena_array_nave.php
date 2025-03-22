<?php

usort($numbers, function($a, $b) {
    return $a <=> $b;
});
/*Esto le dice a usort():

Si $a < $b, devuelve -1 → $a va antes que $b

Si $a > $b, devuelve 1 → $a va después que $b

Si son iguales, no cambia el orden */