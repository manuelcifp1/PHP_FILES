<?php

print_r($array);//Imprime array

$array[] = 10;//Agrega el 10 al final del array

array_push($array, 3,7);//Agrega los values AL FINAL del array (Se usa para agregar varios valores)

unset($array[2]);//Elimina el elemento con índice 2

array_pop($array);//Elimina el último elemento

array_shift($array);//Elimina el primer elemento

sort($array);//Ordena los valores del array en orden ascendente rompiendo el par clave=>valor

asort($array);//Ordena los valores del array manteniendo el par clave=>valor

ksort($array);//Ordena un array asociativo por la clave de cada valor