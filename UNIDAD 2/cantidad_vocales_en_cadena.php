<?php

/*Contar la cantidad de vocales en una cadena. Crear una función que reciba una cadena
 y cuente cuántas vocales contiene.*/

$cadena = "En un lugar de La Mancha de cuyo nombre no quiero acordarme";

$arrayCadena = str_split($cadena);
$numVocales = 0;

for ($i = 0; $i < count($arrayCadena); $i++) {
    if ($arrayCadena[$i] == "a" ||
        $arrayCadena[$i] =="A" ||
        $arrayCadena[$i] == "e" ||
        $arrayCadena[$i] =="E" ||
        $arrayCadena[$i] == "i" ||
        $arrayCadena[$i] =="I" ||
        $arrayCadena[$i] == "o" ||
        $arrayCadena[$i] =="O" ||
        $arrayCadena[$i] == "u" ||
        $arrayCadena[$i] =="U") {
            $numVocales++;

             }
}

echo "Hay $numVocales vocales en la cadena.";