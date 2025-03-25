<?php

$factor = 3;
$multiplicar = function($numero) use ($factor) {
return $numero * $factor;
};
echo $multiplicar(5); // Muestra 15
echo "<br>";
/*A veces, es necesario que una función anónima acceda a variables fuera
de su alcance. En estos casos, se usa "use" para "capturar" esas variables. */

$duplicar = function($numero) {
    return $numero * 2;
    };
    echo $duplicar(5); // Muestra 10
//Puedes asignarla a una variable y llamarla como una función regular    