<?php
if (!defined('STDIN')) {
    define('STDIN', fopen('php://stdin', 'r'));
}

do {
    $opcion = "";
    echo " Selecciona una opción:\n
            1 sumar\n
            2 restar\n
            3 multiplicar\n
            4 dividir\n
            5 salir.\n";
    fscanf(STDIN, '%s', $opcion);         
    $opcion = trim(strtolower($opcion));
    echo $opcion;

    echo "Dame el primer número.\n";
    fscanf(STDIN, '%s', $numeroA);         
    $opcion = trim(strtolower($numeroA));

    echo "Dame el segundo número.\n";
    fscanf(STDIN, '%s', $numeroB);         
    $opcion = trim(strtolower($numeroB));

    
    switch($opcion) {
        case: "1":
            echo 
    }

}while ($opcion == 5);