<?php

$numeros = [1, 2, 3, 4, 5];

$duplicados = array_map(function($n) {
    return $n * 2;
}, $numeros);

print_r($duplicados);

/*array_map() aplica una función a cada elemento de un array
 y devuelve un nuevo array con los resultados. */