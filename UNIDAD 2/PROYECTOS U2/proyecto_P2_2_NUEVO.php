<?php
/*Una tienda online maneja su inventario mediante un array de productos, donde cada producto es un array asociativo
que contiene las claves nombre, cantidad y precio.

Requerimientos:
    - Función actualizarInventario: Crea una función que reciba por referencia el array de productos, el nombre, la cantidad
     y el precio de un producto. La función debe actualizar la cantidad del producto sumando la cantidad que se pasa como argumento.
      Si el producto no existe en el array, deberá añadirlo.

    - Función mostrarInventario: Crea una función que reciba el array de productos y muestre el nombre, cantidad y precio
     de cada producto de manera legible.

    Usa el tipado de argumentos y retorno para mayor claridad. */

$productos = [
    ["nombre"=>"teclado", "cantidad"=>15, "precio"=>27],
    ["nombre"=>"pantalla", "cantidad"=>30, "precio"=>120],
    ["nombre"=>"raton", "cantidad"=>8, "precio"=>12]
];
/*MUY IMPORTANTE: si no ponemos & delante de $productos o $producto no funcionaran los cambios, porque estaríamos trabajando
con una copia del array productos y una copia de producto. Al trabajar por referencia (&), actuamos sobre el array original
(directamente en su espacio de memoria), lo cual es vital en este ejercicio para poder actualizar el inventario.*/

/*En la función siguiente, tipamos adecuadamente a los parámetros y, despues de los :, tipamos al return de la función que será el array
modificado. */
function actualizarInventario (array &$productos, string $nombre, int $cantidad, int $precio): array {
    foreach($productos as &$producto) {
        //Si el nombre del nuevo producto es igual a alguno de los que ya existe, aumentamos el número de unidades.
        if ($producto["nombre"] === $nombre) {
            $producto["cantidad"] += $cantidad;
            break;
        } else {
            //En caso contrario, añadimos el nuevo producto al inventario
            $productos[] = ["nombre"=>$nombre, "cantidad"=>$cantidad, "precio"=>$precio];
            break;
        }        
    }
    //Devuelve el array modificado.
    return $productos;
}

/*Recorremos el array asociativo con un foreach para mostrarlo correctamente.*/
function mostrarInventario (array $productos) {
    foreach ($productos as ["nombre"=>$valorNombre, "cantidad"=>$valorCantidad, "precio"=>$valorPrecio]) {
        echo "Nombre: $valorNombre, Cantidad: $valorCantidad, Precio: $valorPrecio" . "<br>";
    }    
}
//Llamada a actualizarInventario con un nuevo producto a añadir.
actualizarInventario($productos, "joystick", 23, 37);

//Llamada a actualizarInventario con un producto existente para aumentar el número de unidades (cantidad).
actualizarInventario($productos, "teclado", 10, 27);

//Llamada a mostrarInventario para que muestre en pantalla el inventario de productos.
mostrarInventario($productos);

