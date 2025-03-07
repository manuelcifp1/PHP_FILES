<?php
/*Desarrolla un programa que permita al usuario realizar operaciones matemáticas básicas (suma,
resta, multiplicación y división) entre dos números. El programa mostrará un menú de opciones,
y el usuario podrá seleccionar la operación que desee realizar. El proceso deberá repetirse hasta
que el usuario elija la opción de "salir". Asegúrate de manejar adecuadamente la opción de
división por cero. */

/*Primero comprobamos que la constante STDIN está creada, en caso contrario la creamos. STDIN permite leer datos de entrada
por la terminal. */
if (!defined('STDIN')) {
    define('STDIN', fopen('php://stdin', 'r'));
}

/*Creamos un do-while para permanecer en el programa hasta que el usuario elija salir. */
do {    
    echo " Selecciona una opción:\n
    1 sumar\n
    2 restar\n
    3 multiplicar\n
    4 dividir\n
    5 salir.\n";
    fscanf(STDIN, '%s', $opcion);         
    $opcion = trim(strtolower($opcion));    
   
    /*Primero probé a pedir los números antes del switch, pero eso daba resultados erróneos.
    Luego pensé que lo más correcto era pedirlos dentro de cada caso del switch.

    También intenté poner la línea con el resultado después del switch, pero eso daba errores 
    en el caso de la división entre 0 porque no llegaba ningún valor a la variable $resultado.    
    Incluso probé con el resultado dentro de un if que filtrara cuando el numeroB era 0, pero 
    también daba errores y hacía el código más complejo. Esta manera es la que funciona siempre.*/
    
    switch($opcion) {
        
        case "1"://=============================================
        echo "Dame el primer número.\n";
        fscanf(STDIN, '%d', $numeroA);         
        $opcion = trim(strtolower($numeroA));
    
        echo "Dame el segundo número.\n";
        fscanf(STDIN, '%d', $numeroB);         
        $opcion = trim(strtolower($numeroB));

        $resultado = $numeroA + $numeroB;
        echo "El resultado es $resultado. Empezamos otra vez.\n";
        break;//=================================================

        case "2"://=============================================
        echo "Dame el primer número.\n";
        fscanf(STDIN, '%d', $numeroA);         
        $opcion = trim(strtolower($numeroA));
    
        echo "Dame el segundo número.\n";
        fscanf(STDIN, '%d', $numeroB);         
        $opcion = trim(strtolower($numeroB));

        $resultado = $numeroA - $numeroB;
        echo "El resultado es $resultado. Empezamos otra vez.\n";
        break;//=================================================

        case "3"://==============================================
        echo "Dame el primer número.\n";
        fscanf(STDIN, '%d', $numeroA);         
        $opcion = trim(strtolower($numeroA));
    
        echo "Dame el segundo número.\n";
        fscanf(STDIN, '%d', $numeroB);         
        $opcion = trim(strtolower($numeroB));
        
        $resultado = $numeroA * $numeroB;
        echo "El resultado es $resultado. Empezamos otra vez.\n";
        break;//=================================================

        case "4"://===============================================
        echo "Dame el primer número.\n";
        fscanf(STDIN, '%d', $numeroA);         
        $opcion = trim(strtolower($numeroA));
    
        echo "Dame el segundo número.\n";
        fscanf(STDIN, '%d', $numeroB);         
        $opcion = trim(strtolower($numeroB));
        
        if ($numeroB == 0) {
            echo "No se puede dividir por 0.\n";            
        } else {
            $resultado = $numeroA / $numeroB;
            echo "El resultado es $resultado. Empezamos otra vez.\n";            
        } 
        break;//=====================================================

        case "5"://==================================================
        break;//=====================================================                     
    }     

}while ($opcion != 5);

