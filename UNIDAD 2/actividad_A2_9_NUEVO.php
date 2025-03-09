<?php
/*1. Gestión de Números en un Array

Supongamos que tienes un array que almacena una lista de números enteros. Necesitamos crear dos funciones:

   - Función agregarNumero: Que reciba un array de números por referencia y agregue un nuevo número al final del array.
   - Función mostrarNumeros: Que reciba el array de números y los muestre uno por uno.*/
   $numerosEnteros = [35, 75, 120, 45, 300, 500, 60, 80, 150, 499]; 

   function agregarNumero(&$arrayNumeros, $numeroNuevo):array {
      $arrayNumeros[] = $numeroNuevo;
      return $arrayNumeros;
   }
  
   function mostrarNumeros($arrayNumeros) {
      for ($i = 0; $i < count($arrayNumeros); $i++) {
          echo $arrayNumeros[$i] . "<br>";
      }
   }   

/*2. Comprobar si una cadena es un palíndromo: Crear una función que verifique si una cadena es un palíndromo
 (se lee igual de izquierda a derecha que de derecha a izquierda, ignorando espacios, mayúsculas y acentos).*/
function comprobarPalindromo(string $cadena): string {
    //Quitamos espacios y cambiamos a minúsculas
    $cadena = trim(string: strtolower(string: $cadena));
    //Eliminamos acentos
    $acentos = ["á"=>"a", "é"=>"e","í"=>"i", "ó"=>"o", "ú"=>"u"];
    $sinAcentos = strtr($cadena, $acentos);
    //Invertimos la cadena
    $invertida = strrev($sinAcentos);
    //Comprobamos si la inversión es igual a la cadena original
    if ($invertida == $cadena) {
        echo "La cadena es palíndromo<br>";
    } else {
        echo "La cadena no es palíndromo<br>";
    }    
};

comprobarPalindromo("lámina");


/*3. Reemplazar una palabra en una cadena: Crear una función que reciba una cadena, una palabra a buscar y una palabra de reemplazo,
 y reemplace todas las ocurrencias de la palabra buscada por la palabra de reemplazo.*/

/*4. Obtener la fecha y hora actual: Crear una función que devuelva la fecha y hora actual en el formato Y-m-d H:i:s.*/

/*5. Sumar días a una fecha: Crear una función que reciba una fecha y una cantidad de días,
 y devuelva la nueva fecha después de sumar esos días.*/

