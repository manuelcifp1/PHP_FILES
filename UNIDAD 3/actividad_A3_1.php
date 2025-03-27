<?php
/*Clasificación de estudiantes por calificaciones

Supongamos que tienes una lista de calificaciones de estudiantes y deseas categorizarlos
 en grupos (A, B, C, etc.) en función de sus calificaciones. Podemos utilizar <=> para comparar
  la calificación de cada estudiante y asignarles una categoría basada en si son mejores,
   peores o iguales a ciertos umbrales. */

$grades = [95, 80, 60, 75, 90, 30];
$suspenso = [];
$aprobado = [];
$notable = [];
$sobresaliente = [];

foreach($grades as $grade) {
    if (($grade<=>89) == 1) {
        $sobresaliente[] = $grade;
    } elseif(($grade<=>69) == 1) {
        $notable[] = $grade;
    } elseif(($grade<=>49) == 1) {
        $aprobado[] = $grade;
    } elseif(($grade<=>0) == 1) {
        $suspenso[] = $grade;
    }
}

print_r($suspenso)  . "<br>";
print_r($aprobado) . "<br>";
print_r($notable) . "<br>";
print_r($sobresaliente)  . "<br>";

echo "<br><br>";
/*Clasificación de productos por volumen de ventas

Si estamos desarrollando un sitio de ventas, podemos utilizar el operador <=> para clasificar
 productos en función de su popularidad. Los productos con más ventas o calificaciones positivas
  pueden recibir una etiqueta de «más popular» en comparación con otros. */

$products = [

["name" => "Producto A", "sales" => 100],

["name" => "Producto B", "sales" => 50],

["name" => "Producto C", "sales" => 75],

];




/*Ordenar entrega de paquetes por distancia.

Supongamos que estás desarrollando una aplicación de entrega de pedidos y deseas determinar
 el orden en que los repartidores deben entregar los pedidos según la distancia de las direcciones
  de entrega. Puedes usar <=> para comparar las distancias y asignar el orden de entrega. */

$distances = [5.2, 3.8, 7.1, 2.5];

usort($distances, function($distanceA, $distanceB) {
     return $distanceA<=>$distanceB;
    });

    print_r($distances);

    echo "<br><br>";

/*Clasificación de productos según reseñas

Si tienes una tienda online y deseas clasificarlos según sus reseñas de los usuarios,
 puedes usar <=> para clasificarlos como «bien calificados», «regulares» o «mal calificados»
  en función de la puntuación promedio. */

$productos = [

["name" => "producto A", "rating" => 4.5],

["name" => "producto B", "rating" => 3.2],

["name" => "producto C", "rating" => 4.8],

];

foreach($productos as ["rating"=> $rating]) {
    switch($rating) {
        case ($rating<=>4.8) === 0:
        echo "<p>Producto C bien calificado.<br>";
        break;

        case ($rating<=>4.5) === 0:
        echo "<p>Producto A regular calificado.<br>";
        break;

        case ($rating<=>3.2) === 0:
        echo "<p>Producto B mal calificado.<br>";
        break;

    }
}

echo "<br><br>";
/*Dado un array de edades. Utiliza usort con una función flecha para ordenar el array de
 menor a mayor usando el operador de nave espacial.*/
 $edades = [25, 18, 32, 20, 40, 27];

 usort($edades, fn ($edadA, $edadB) =>  $edadA<=>$edadB);

 print_r($edades);

 echo "<br><br>";
/*Dado un array de nombres, usa usort y una función flecha para ordenar los nombres de forma
 descendente (de Z a A) alfabéticamente.*/ 
 $nombres = ["Ana", "Carlos", "Beatriz", "Eduardo", "Daniel"];

 usort($nombres, fn ($nomA, $nomB) => $nomB<=>$nomA);

 print_r($nombres);

 echo "<br><br>";
/*Tienes un array de precios de productos. Utiliza usort con una función flecha para ordenar
 los precios de mayor a menor. */
  $precios = [200.5, 99.99, 150.0, 50.75, 120.25];

  usort($precios, fn ($precA, $precB) => $precB<=>$precA);

    print_r($precios);

    echo "<br><br>";


/*Dado un array de nombres de ciudades, usa usort y una función flecha para ordenar las ciudades
 de menor a mayor según la longitud de sus nombres.*/
  $ciudades = ["Roma", "Santiago", "Buenos Aires", "Lima", "La Paz", "Montevideo"];

  usort($ciudades, fn ($cityA, $cityB) => (strlen($cityA))<=>strlen($cityB));

  print_r($ciudades);
 
  echo "<br><br>";
/*Tienes un array que contiene números negativos y positivos. Usa usort con una función flecha
 y el operador de nave espacial para ordenarlos de menor a mayor.*/
 $numeros = [3, -1, -4, 2, 0, -2, 5];

 usort($numeros, fn ($numA, $numB) =>  $numA<=>$numB);

 print_r($numeros);

 echo "<br><br>";




/*Tienes un array de productos, cada uno con un precio y un nombre. Usa usort y una función flecha
 para ordenar los productos de menor a mayor por precio. Si dos productos tienen el mismo precio,
  ordénalos alfabéticamente por nombre.*/

$productitos = [

    ["nombre" => "Producto A", "precio" => 200],

    ["nombre" => "Producto B", "precio" => 150],

    ["nombre" => "Producto C", "precio" => 200],

    ["nombre" => "Producto D", "precio" => 100],

];

usort($productitos, fn($a, $b) =>
    ($a['precio'] <=> $b['precio']) !== 0 ? $a['precio'] <=> $b['precio'] : $a['nombre'] <=> $b['nombre']
);

print_r($productitos);