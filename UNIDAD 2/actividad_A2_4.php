<?php 

/*1. Crea un array que almacene las siguientes notas: (7,9,8,10,6). */
echo "Ejercicio 1:";
echo "<br>";
echo "<br>";
$notas = array(7,9,8,10,6);
print_r($notas);
echo "<br>";
echo "<br>";

/*2. Crea un array llamado estudiantes:

    "Juan" con nota 8

    "María" con nota 9

    "Carlos" con nota 7

    "Ana" con nota 10 */
echo "Ejercicio 2:";
echo "<br>";
echo "<br>";
$estudiantes = ["Juan"=>8, "María"=>9, "Carlos" => 7, "Ana" => 10];
print_r($estudiantes);
echo "<br>";
echo "<br>";

/*3. Crea un array escalar llamado $numeros con los valores: 5, 3, 9, 2, 8.
- Agrega el número 10 al final del array.
- Elimina el segundo elemento del array (el que tiene el valor 3).
- Modifica el último elemento del array y cámbialo a 12.*/
echo "Ejercicio 3:";
echo "<br>";
echo "<br>";
$numeros = [5, 3, 9, 2, 8];
print_r($numeros);
echo "<br>";
$numeros[] = 10;
print_r($numeros);
echo "<br>";
unset($numeros[1]);
print_r($numeros);
echo "<br>";
$numeros[5] = 12;
print_r($numeros);
echo "<br>";
echo "<br>";

/*4. Crea un array llamado $numeros con los valores: 8, 3, 1, 5, 7.
Ordena el array en orden ascendente.*/
echo "Ejercicio 4:";
echo "<br>";
echo "<br>";
$numerosDos = [8, 3, 1, 5, 7];
print_r($numerosDos);
echo "<br>";
sort($numerosDos);
print_r($numerosDos);
echo "<br>";
echo "<br>";

/*5. Crea un array asociativo llamado $ciudades con los siguientes valores:
"Madrid" => 3200000
"Barcelona" => 1600000
"Valencia" => 800000
"Sevilla" => 700000    
- Ordena el array por los nombres de las ciudades*/
echo "Ejercicio 5:";
echo "<br>";
echo "<br>";
$ciudades = 
["Madrid" => 3200000,
"Barcelona" => 1600000,
"Valencia" => 800000,
"Sevilla" => 700000];
print_r($ciudades);
echo "<br>";
echo "<br>";
ksort($ciudades);
print_r($ciudades);
echo "<br>";
echo "<br>";

/*6. Crea un array llamado $productos con los siguientes valores:
"Camiseta" => 20
"Pantalón" => 40
"Zapatos" => 60
- Elimina el producto "Pantalón".
- Agrega un nuevo producto "Chaqueta" con un precio de 50.
- Modifica el precio de "Camiseta" a 25.*/
echo "Ejercicio 6:";
echo "<br>";
echo "<br>";
$productos = 
["Camiseta" => 20,
"Pantalón" => 40,
"Zapatos" => 60];
print_r($productos);
echo "<br>";
echo "<br>";
unset($productos["Pantalón"]);
print_r($productos);
echo "<br>";
echo "<br>";
$productos["Chaqueta"] = 50;
print_r($productos);
echo "<br>";
echo "<br>";
$productos["Camiseta"] = 25;
foreach($productos as $producto => $precio) {
    echo "El producto " . $producto . " vale " . $precio . "<br>";
}
echo "<br>";
echo "<br>";
