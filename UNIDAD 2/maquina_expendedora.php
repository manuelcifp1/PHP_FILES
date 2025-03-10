<?php
/*Desarrolla el código para una máquina expendedora de chuches que funciona con tarjeta.
La tarjeta tendrá un saldo inicial de 10€. El inventario de los productos debe estar en un array asociativo
donde cada elemento del array sea el código del producto y las unidades disponibles. Empezará así:

$inventario = ["A"=>3, "B"=>3, "C"=>3, "D"=>3]

Cuando elijas un producto, el programa deberá comprobar si hay existencias del mismo:
- Si no quedan existencias, recibirás un mensaje informativo y volverás al menú inicial para comprar otro.
- Si hay existencias, el programa te dirá el importe a abonar y te ofrecerá un nuevo menú para pagar.

En el momento de pagar, si tu tarjeta:
- No tiene saldo para ningún producto: te informará de tu saldo y se cerrará el programa.
- No tiene saldo suficiente para el producto elegido pero al menos tiene para el producto más barato:
  recibirás un mensaje informativo con el saldo disponible y te devolverá al menú principal.
- Tiene saldo suficiente para pagar el producto: lo descontará del inventario, descontará el importe de tu saldo,
  imprimirá un mensaje con tu saldo actualizado, entregando el producto con agradecimiento y finalmente te devolverá
  al menú principal.
 
Si eliges la opción E, se cerrará el programa. */

if(!defined('STDIN')) {
    define('STDIN', fopen('php://stdin', 'r'));
}
//Creamos el inventario y asignamos el saldo de la tarjeta a una variable.
$inventario = ["A"=>3, "B"=>3, "C"=>3, "D"=>3];
$saldo = 10;

//Creamos un do/while para mantener al usuario en el menú mientras no elija la opción E.
do {    
    echo "Elija una opción: \n
      A) Patatas fritas 3.00€\n
      B) Chocolatina 2.50€\n
      C) Cacahuetes 4.00€\n
      D) Gominolas 1.50€\n
      E) Salir.\n";
      
    fscanf(STDIN, '%s', $opcion);
    $opcion = trim(strtoupper($opcion));    

    //Creamos un foreach para comprobar si hay existencias del producto.
    foreach ($inventario as $articulo => $unidades) {
        if ($opcion == $articulo && $unidades == 0) {            
            echo "Producto agotado, elija otra opción.\n";                    
        } elseif ($opcion == $articulo && $unidades > 0) {
            //Aquí creamos un switch para informar sobre el importe a abonar.
            switch($opcion) {

                case "A":/*======================================== */
                echo "El importe a abonar es 3.00€\n";                
                echo "Teclee el importe a abonar.\n";
                fscanf(STDIN, '%f', $pago);
                $pago = trim($pago);
                break;/*=========================================== */

                case "B":/*======================================== */
                echo "El importe a abonar es 2.50€\n";
                echo "Teclee el importe a abonar.\n";
                fscanf(STDIN, '%f', $pago);
                $pago = trim($pago);
                break;/*============================================ */

                case "C":/*========================================= */
                echo "El importe a abonar es 4.00€\n";
                echo "Teclee el importe a abonar.\n";
                fscanf(STDIN, '%f', $pago);
                $pago = trim($pago);
                break;/*============================================ */

                case "D":/*========================================= */
                echo "El importe a abonar es 1.50€\n";
                echo "Teclee el importe a abonar.\n";
                fscanf(STDIN, '%f', $pago);
                $pago = trim($pago);
                break;/*============================================ */
                
            }

            /*Y aquí creamos un if/else para comprobar si hay saldo en la tarjeta:
            - Si no hay bastante para ningún producto, informamos al usuario y se cierra el programa.    
            - Si no hay bastante para ese producto, informamos al usuario y volvemos al principio
              para probar con otro producto más barato. 
            - Si hay saldo, descontamos el importe del saldo, descontamos 1 unidad del inventario e 
              informamos del saldo tras la compra con un mensaje de entrega del producto.*/
            if ($saldo < 1.50) {
                echo "Saldo en tarjeta $saldo €, insuficiente para cualquier producto.\n";
                exit();                
            } elseif ($saldo < $pago) {
                echo "Saldo en tarjeta $saldo €, insuficiente para este producto. Pruebe con otro.\n";
            } elseif ($saldo >= $pago ) {
                foreach ($inventario as $articulo => $unidades) {
                    if ($opcion == $articulo) { 
                        $inventario[$articulo]--;                       
                        $saldo -= $pago;                        
                        echo "Saldo en tarjeta $saldo €. Aquí tiene su producto, gracias por su compra.\n";
                    }
                }    
            }
        }
    }    

} while ($opcion != "E");
//Mensaje de salida
echo "Gracias por su visita";
     