<?php

print_r($array);//Imprime array

$array[] = 10;//Agrega el 10 al final del array

array_push($array, 3,7);//AGREGA los values AL FINAL del array (Se usa para agregar VARIOS valores)

unset($array[$i]);//ELIMINA el elemento con índice i.

array_pop($array);//ELIMINA el ÚLTIMO elemento.

array_shift($array);//ELIMINA el PRIMER elemento.

sort($array);//ORDENA los valores del array en orden ascendente ROMPIENDO el par CLAVE=>VALOR.

asort($array);//ORDENA los valores del array. MANTIENE el par CLAVE=>VALOR.

ksort($array);//ORDENA un array asociativo por la CLAVE de cada valor.

preg_replace("/[^a-z]/", "", $cadena);/*Eliminar espacios y signos de puntuación
 (regEx: todo lo que no sea una minúscula se reemplaza por nada "")
 preg_replace reemplaza fragmentos de cadena equivalentes a una regEx por un replacement.*/

//Eliminar acentos.
$acentos = ["á"=>"a", "é"=>"e","í"=>"i", "ó"=>"o", "ú"=>"u"];
strtr($cadena, $acentos); //strtr reemplaza elementos de una cadena usando un array...
strtr("Hilla Warld","ia","eo");//...o también con strings (la i por e, la a por o)
strtr($string, "o", "O");

strrev($cadena);//Invertir cadena

ucfirst($string);//Convierte en mayúsculas la primera letra de una cadena.

ucwords($string);//Convierte a mayúsculas la primera letra de cada palabra.

strcmp($stringA, $stringB); //Compara longitud de 2 cadenas: 1, mayor la A; 0 iguales; -1 mayor la B. 

explode(' ', $string);//Crea un array a partir de una cadena según un separador.

str_split($string);//Lo mismo pero sin separador, cada elemento de la string es un elemento del array.

substr($string, 1, 2);//Extrae a partir del elemento 1 no inclusive dos elementos más. substr("ejemplo", 1, 2) = "je".

strpos($string, "algo");//Devuelve un número, posición del elemento en la cadena.

