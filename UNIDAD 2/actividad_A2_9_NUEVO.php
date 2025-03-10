<?php
/*1. Gestión de Números en un Array

Supongamos que tienes un array que almacena una lista de números enteros. Necesitamos crear dos funciones:

   - Función agregarNumero: Que reciba un array de números por referencia y agregue un nuevo número al final del array.
   - Función mostrarNumeros: Que reciba el array de números y los muestre uno por uno.*/
   echo "1. GESTION DE NÚMEROS EN UN ARRAY<br>"; 
   $numerosEnteros = [35, 75, 120, 45, 300, 500, 60, 80, 150, 499];
   echo "Array de números enteros: <br>";
   for ($i = 0; $i < count($numerosEnteros); $i++) {
    echo "$numerosEnteros[$i] ";
   }
   echo "<br>";

   echo "Le añadimos un elemento: <br>";
   function agregarNumero(&$arrayNumeros, $numeroNuevo):array {
      $arrayNumeros[] = $numeroNuevo;
      return $arrayNumeros;
   }

   agregarNumero($numerosEnteros, 11);
     
   function mostrarNumeros($arrayNumeros) {
      for ($i = 0; $i < count($arrayNumeros); $i++) {
          echo "$arrayNumeros[$i] ";
      }
   }

   mostrarNumeros($numerosEnteros);
   echo"<br>";
   echo"<br>";
   echo"<br>";
   
   
/*2. Comprobar si una cadena es un palíndromo: Crear una función que verifique si una cadena es un palíndromo
 (se lee igual de izquierda a derecha que de derecha a izquierda, ignorando espacios, mayúsculas y acentos).*/
 echo "2. PALÍNDROMO<br>";
 echo "Dábale arroz a la zorra el abad<br>"; 
function comprobarPalindromo(string $cadena) {
    //Cambiamos a minúsculas
    $cadena = strtolower( $cadena);
    echo "Cambio a minúsculas: $cadena <br>";//Creamos puntos de control para verificar que todo va bien.    
    //Eliminamos acentos
    $acentos = ["á"=>"a", "é"=>"e","í"=>"i", "ó"=>"o", "ú"=>"u"];
    $cadena = strtr($cadena, $acentos);
    echo "Eliminación de acentos: $cadena <br>";
    /*Eliminamos espacios y signos de puntuación (expresión regular que representa
    todo lo que no sea una minúscula se cambia por nada "")*/
    $cadena = preg_replace("/[^a-z]/", "", $cadena);
    echo "Eliminación de espacios y signos de puntuación: $cadena <br>";
    //Invertimos la cadena
    $invertida = strrev($cadena);
    echo "Invertimos la cadena: $invertida <br>";
    //Comprobamos si la inversión es igual a la cadena original
    if ($invertida === $cadena) {
        echo "La cadena es palíndromo<br>";
    } else {
        echo "La cadena no es palíndromo<br>";
    }    
};

comprobarPalindromo("Dábale arroz a la zorra el abad");
echo"<br>";
echo"<br>";
echo"<br>";

/*3. Reemplazar una palabra en una cadena: Crear una función que reciba una cadena, una palabra a buscar y una palabra de reemplazo,
 y reemplace todas las ocurrencias de la palabra buscada por la palabra de reemplazo.*/
echo "3. REEMPLAZAR UNA PALABRA DE UNA CADENA<br>";
echo "Me llamo Manolo<br>"; 
function reemplazarPalabra ($palabraBuscar, $palabraReemplazo, $string) {
    //De nuevo, usamos preg_replace con una regEx para hacer el cambio de palabras
    $reemplazada = preg_replace("/$palabraBuscar/", $palabraReemplazo, $string);
    echo "$reemplazada<br>";
} 

reemplazarPalabra( "Manolo", "Pepe", "Me llamo Manolo");
echo"<br>";
echo"<br>";
echo"<br>";

/*4. Obtener la fecha y hora actual: Crear una función que devuelva la fecha y hora actual en el formato Y-m-d H:i:s.*/
echo "4. FECHA Y HORA ACTUAL<br>";
function fechaHoraActual() {
    echo date("Y-m-d H:i:s<br>");
}

fechaHoraActual();
echo"<br>";
echo"<br>";
echo"<br>";

/*5. Sumar días a una fecha: Crear una función que reciba una fecha y una cantidad de días,
 y devuelva la nueva fecha después de sumar esos días.*/
echo "5. SUMAR DÍAS A UNA FECHA<br>"; 
function sumaDias($fecha, $numeroDias) {
    //Usamos strtotime, función con la que se pueden modificar fechas fácilmente
    $nuevaFecha = date("Y-m-d", strtotime($fecha . " +$numeroDias days"));

echo "$nuevaFecha<br>";

}
echo "Sumamos 863 días al 2025-03-09<br>";
sumaDias("2025-03-09", 863);


 ?>