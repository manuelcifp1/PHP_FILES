<?php
    /*Uso de switch:
    Escribe un programa en PHP que simule un menú de selección de opciones para un cajero automático. 
    Las opciones deben ser las siguientes:
        Consultar saldo.
        Realizar depósito.
        Retirar dinero.
        Salir.
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
        
$saldo = 1000; //Ponemos 1000 de saldo para empezar con algo de liquidez
$mensaje = ""; //Y esto para un mensaje informativo de la situación del saldo
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $opcion = $_POST['opcion'];

    switch ($opcion) {
        case 'consultar':
            $mensaje = "Tu saldo actual es: €" . $saldo;
            break;

        case 'depositar':
            $cantidad = $_POST['cantidad'];
            $saldo += $cantidad;
            $mensaje = "Has depositado €" . $cantidad . ". Tu nuevo saldo es: €" . $saldo;
            break;

        case 'retirar':
            $cantidad = $_POST['cantidad'];
            if ($cantidad > $saldo) {
                $mensaje = "Error: No puedes retirar más dinero del disponible. Tu saldo actual es: €" . $saldo;
            } else {
                $saldo -= $cantidad;
                $mensaje = "Has retirado €" . $cantidad . ". Tu nuevo saldo es: €" . $saldo;
            }
            break;

        case 'salir':
            break;

        default:
            $mensaje = "Opción no válida.";
            break;
    }
}


    
    