<?php
    /*A) Uso de switch:
        
    Escribe un programa en PHP que simule un menú de selección de opciones para un cajero automático. 
    Las opciones deben ser las siguientes:
        1.- Consultar saldo.
        2.- Realizar depósito.
        3.- Retirar dinero.
        4.- Salir.
    El programa debe recibir la opción seleccionada por el usuario y
    utilizar una sentencia switch para realizar las operaciones correspondientes.
        Notas:
        Para "Realizar depósito", pide al usuario la cantidad a depositar y súmala al saldo.
        Para "Retirar dinero", pide al usuario la cantidad a retirar y réstala del saldo
         (valida que no sea mayor que el saldo disponible).
        La opción "Salir" debe terminar el programa.
        Puedes ingresar las opciones mediante un formulario.
        Como aún nos faltan herramientas nos vamos a remitir a una única instrucción por ejecución del programa. 
        Terminando el programa independientemente de la opción seleccionada.*/

if (!defined('STDIN')) {
    define('STDIN', fopen('php://stdin', 'r'));
}        
        
$saldo = 1000; //Ponemos 1000 de saldo para empezar con algo de liquidez
do {

    echo "Elige una opción:\n
          1.- Consultar saldo.\n
          2.- Realizar depósito.\n
          3.- Retirar dinero.\n
          4.- Salir.\n";

    fscanf(STDIN, '%s', $opcion);
    $opcion = trim($opcion);
    
    switch($opcion) {

        case "1":/*===================================== */
        echo "Su saldo actual es de $saldo €\n";
        break;/*======================================== */

        case "2":/*===================================== */
        echo "Introduzca la cantidad a ingresar.\n";
        fscanf(STDIN, '%d', $ingreso);
        $ingreso = trim($ingreso);
        $saldo += $ingreso;
        break;/*============================================ */
        
        case "3":/*========================================== */
        echo "Introduzca la cantidad a retirar.\n";
        fscanf(STDIN, '%d', $retirada);
        $retirada = trim($retirada);
        if ($retirada > $saldo) {
            echo "Saldo insuficiente.\n";            
        } else {
            $saldo -= $retirada;
        }
        break;/*================================================= */
        
        default:
        break;
    }

} while($opcion != "4");


    
    