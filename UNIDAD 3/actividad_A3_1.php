<?php
/*Clasificación de estudiantes por calificaciones

Supongamos que tienes una lista de calificaciones de estudiantes y deseas categorizarlos
 en grupos (A, B, C, etc.) en función de sus calificaciones. Podemos utilizar <=> para comparar
  la calificación de cada estudiante y asignarles una categoría basada en si son mejores,
   peores o iguales a ciertos umbrales. */

$grades = [95, 80, 60, 75, 90];



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


/*Clasificación de productos según reseñas

Si tienes una tienda online y deseas clasificarlos según sus reseñas de los usuarios,
 puedes usar <=> para clasificarlos como «bien calificados», «regulares» o «mal calificados»
  en función de la puntuación promedio. */

$productos = [

["name" => "producto A", "rating" => 4.5],

["name" => "producto B", "rating" => 3.2],

["name" => "producto C", "rating" => 4.8],

];


/*Dado un array de edades. Utiliza usort con una función flecha para ordenar el array de
 menor a mayor usando el operador de nave espacial.*/
 $edades = [25, 18, 32, 20, 40, 27];


/*Dado un array de nombres, usa usort y una función flecha para ordenar los nombres de forma
 descendente (de Z a A) alfabéticamente.*/ 
 $nombres = ["Ana", "Carlos", "Beatriz", "Eduardo", "Daniel"];


/*Tienes un array de precios de productos. Utiliza usort con una función flecha para ordenar
 los precios de mayor a menor. */
  $precios = [200.5, 99.99, 150.0, 50.75, 120.25];


/*Dado un array de nombres de ciudades, usa usort y una función flecha para ordenar las ciudades
 de menor a mayor según la longitud de sus nombres.*/
  $ciudades = ["Roma", "Santiago", "Buenos Aires", "Lima", "La Paz", "Montevideo"];


/*Tienes un array que contiene números negativos y positivos. Usa usort con una función flecha
 y el operador de nave espacial para ordenarlos de menor a mayor.*/
 $numeros = [3, -1, -4, 2, 0, -2, 5];


/*Tienes un array de productos, cada uno con un precio y un nombre. Usa usort y una función flecha
 para ordenar los productos de menor a mayor por precio. Si dos productos tienen el mismo precio,
  ordénalos alfabéticamente por nombre.*/

$productos = [

    ["nombre" => "Producto A", "precio" => 200],

    ["nombre" => "Producto B", "precio" => 150],

    ["nombre" => "Producto C", "precio" => 200],

    ["nombre" => "Producto D", "precio" => 100],

];