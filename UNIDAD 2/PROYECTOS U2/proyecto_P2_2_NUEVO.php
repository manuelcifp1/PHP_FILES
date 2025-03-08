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

function actualizarInventario (array &$productos, string $nombreNuevo, int $cantidadNueva, int $precioNuevo): array {
    foreach($productos as ["nombre"=>$valorNombre, "cantidad"=>$valorCantidad]) {
        if ($valorNombre == $nombreNuevo) {
            $valorCantidad+= $cantidadNueva;
        } else {
            $productos[] = ["nombre"=>$nombreNuevo, "cantidad"=>$cantidadNueva, "precio"=>$precioNuevo];
        }
    }
    return $productos;
}

function mostrarInventario (array $productos) {
    foreach ($productos as ["nombre"=>$valorNombre, "cantidad"=>$valorCantidad, "precio"=>$valorPrecio]) {
        echo "Nombre: $valorNombre, Cantidad: $valorCantidad, Precio: $valorPrecio" . "<br>";
    }    
}

actualizarInventario($productos, "joystick", 23, 37);
actualizarInventario($productos, "teclado", 10, 27);

mostrarInventario($productos);

