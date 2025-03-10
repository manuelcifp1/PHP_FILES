<?php
/*Desarrolla el código para una máquina expendedora de chuches que funciona con una tarjeta corporativa.
La tarjeta tendrá un saldo inicial de 10€. El inventario de los productos debe estar en un array asociativo
donde cada elemento del array sea el código del producto y las unidades disponibles. Empezará así:

$inventario = ["A"=>3, "B"=>3, "C"=>3, "D"=>3]

Cuando elijas un producto, el programa deberá comprobar si hay existencias del mismo.Si no quedan existencias,
 recibirás un mensaje informativo y volverás al menú inicial para comprar otro.
Después de elegir, el programa te dirá el importe a abonar y te ofrecerá un nuevo menú para pagar. 
Si tu tarjeta no tiene saldo, recibirás un mensaje informativo y se cerrará el programa. También se puede cerrar el programa
con la opción E.*/

if(!defined('STDIN')) {
    define('STDIN', fopen('php://stdin', 'r'));
}
//Creamos el inventario y asignamos el saldo de la tarjeta a una variable.
$inventario = ["A"=>3, "B"=>3, "C"=>3, "D"=>3];
$saldo = 10;

//Creamos un do/while para mantener al usuario en el menú mientras no elija al opción E.
do {
    echo "Elija una opción: \n
      A) Patatas fritas 3.00€\n
      B) Chocolatina 2.50€\n
      C) Cacahuetes 4.00€\n
      D) Gominolas 1.50€\n
      E) Salir.\n";
      
    fscanf(STDIN, '%s', $opcion);
    $producto = trim(strtoupper($opcion));

    //Creamos un foreach para comprobar si hay existencias del producto.
    foreach ($inventario as $articulo => $unidades) {
        if ($articulo == $opcion) {
            if ($unidades == 0) {
                echo "Producto agotado, elija otra opción.\n";
                break;        
        }
      }
    }

    //Ahora creamos un switch para informar sobre el importe a abonar.
    switch($opcion) {
        case "A":
        echo "El importe a abonar es 3.00€\n";
        break;
        case "B":
        echo "El importe a abonar es 2.50€\n";
        break;
        case "C":
        echo "El importe a abonar es 4.00€\n";
        break;
        case "D":
        echo "El importe a abonar es 1.50€\n";
        break;          
    }

    //Ofrecemos un menú de pago.
    echo "Elija una opción de pago: \n
        1.- 1.50€\n
        2.- 2.50€\n
        3.- 3.00€\n
        4.- 4.00€\n";

    fscanf(STDIN, '%d', $opcionPago);

    /*Creamos un if/else para comprobar si hay saldo en la tarjeta. Si no hay, informamos al usuario y
    volvemos al principio para probar con otro producto más barato. Si hay saldo,
    imprimimos un mensaje de entrega del producto y agradecimiento y descontamos 1 unidad del producto 
    del array inventario.*/
    if ($opcionPago > $saldo) {
        echo "Saldo en tarjeta insuficiente. Elija con otro producto.\n";
        break;
    } else {
        foreach ($inventario as $articulo => $unidades) {
            if ($articulo == $opcion) {
                echo "Aquí tiene su producto, gracias por su compra.\n";
                $unidades--;
            }
        }    
    }

} while ($producto != "5");
     