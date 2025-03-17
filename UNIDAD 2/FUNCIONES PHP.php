<?php

print_r($array);//Imprime array

//==========AGREGAR==================================================================================================

$array[] = 10;//AGREGA el 10 AL FINAL del array

array_push($array, 3,7);//AGREGA los values AL FINAL del array (Se usa para agregar VARIOS valores)

//==================ELIMINAR========================================================================================

unset($array[$i]);//ELIMINA el elemento con índice i.

array_pop($array);//ELIMINA el ÚLTIMO elemento.

array_shift($array);//ELIMINA el PRIMER elemento.

//===============ORDENAR==============================================================================================

sort($array);//ORDENA los valores del array en orden ascendente ROMPIENDO el par CLAVE=>VALOR.

asort($array);//ORDENA los valores del array. MANTIENE el par CLAVE=>VALOR.

ksort($array);//ORDENA un array asociativo por la CLAVE de cada valor.

//==============REEMPLAZAR=====================================================================================

preg_replace("/[^a-z]/", "", $cadena);/*Eliminar espacios y signos de puntuación
 (regEx: todo lo que no sea una minúscula se reemplaza por nada "")
 preg_replace reemplaza fragmentos de cadena equivalentes a una regEx por un replacement.*/

//Eliminar acentos.
$acentos = ["á"=>"a", "é"=>"e","í"=>"i", "ó"=>"o", "ú"=>"u"];
strtr($string, $acentos); //strtr reemplaza elementos de una cadena usando un array...
strtr("Hilla Warld","ia","eo");//...o también con strings (la i por e, la a por o)
strtr($string, "o", "O");

strrev($cadena);//Invertir cadena

//====================A MAYÚSCULAS LA 1ª======================================================
ucfirst($string);//Convierte en mayúsculas la primera letra de una cadena.

ucwords($string);//Convierte a mayúsculas la primera letra de cada palabra.

//======================COMPARAR===================================================================

strcmp($stringA, $stringB); //Compara longitud de 2 cadenas: 1, mayor la A; 0 iguales; -1 mayor la B.

//========================CADENA A ARRAY=================================================================

explode(' ', $string);//Crea un array a partir de una cadena según un separador.

str_split($string);//Lo mismo pero sin separador, cada elemento de la string es un elemento del array.

//====================SUSTRAER================================================================================

substr($string, 1, 2);//Extrae a partir del elemento 1 no inclusive dos elementos más. substr("ejemplo", 1, 2) = "je".

strpos($string, "algo");//Devuelve un número, posición del elemento en la cadena.

//================FECHA===============================================================

getdate();//Devuelve un array con la fecha actual descompuesta en muchos parámetros

date_add($date, $intervalo);
// Crear un objeto DateTime para una fecha específica
$date = new DateTime('2025-03-10');

// Mostrar la fecha original
echo "Fecha original: " . $date->format('Y-m-d') . "\n";

// Crear un intervalo de 10 días
$intervalo = new DateInterval('P10D');

// Añadir el intervalo a la fecha
date_add($date, $intervalo);

// Mostrar la fecha modificada
echo "Fecha modificada: " . $date->format('Y-m-d') . "\n";
//================================================================================
strtotime($fecha . " +$numeroDias days");//Mucho más sencilla para añadir días a una fecha.

date("Y-m-d H:i:s<br>");//Le das unos parámetros y te da la fecha y hora actuales.

//TEMA 3

"/^[A-Za-zÁÉÍÓÚáéíóúÑñÜü'´]+$/";//RegEx nombre.

preg_match("/^[A-Za-zÁÉÍÓÚáéíóúÑñÜü'´]+$/", $string);//Compara. 1 sí, 0 no, false error.