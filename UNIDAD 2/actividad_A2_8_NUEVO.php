<?php 
/*Recorrer un array de precios de productos.
 Se pretende no tener en cuenta los precios de valor menor a 50 y detener el recorrido si el producto tiene un valor mayor o igual a 500.

En conclusión, aplicaremos las siguientes reglas:

   - Si el producto tiene un precio inferior a 50, debes continuar con el siguiente producto (Continue).

   - Si el producto tiene un precio mayor o igual a 500, detener el bucle por completo usando break.
    No se gestionan productos demasiado caros por encima de ese valor.

   - Para los productos con precios entre 50 y 499, imprime su precio y simula una compra restando una cantidad de stock disponible.
    La cantidad de stock inicial es 10.

   - Si el stock disponible llega a 0, imprime un mensaje y finaliza la ejecución del script por completo usando exit(),
    ya que no tiene sentido continuar sin stock.

    Ejemplo de inicialización de variables:

$precios_productos = [35, 75, 120, 45, 300, 500, 60, 80, 150, 499];

 $stock = 10; */

 $precios_productos = [35, 75, 120, 45, 300, 500, 60, 80, 150, 499];
 $stock = 1;

 for ($i = 1; $i <= count($precios_productos); $i++) {
    if ($precios_productos[$i] < 50) {
        continue;
    } elseif ($precios_productos[$i] >= 500) {
        break;
    } elseif ($precios_productos[$i] > 50 && $precios_productos[$i] < 499) {
        echo "Precio del producto: $precios_productos[$i]<br>";
        $stock--;
    } elseif ($stock = 0) {
        exit("El programa se cerrará");
    }
 }