<?php

/*B) Uso do-while

Escribe un programa en PHP que simule un juego de adivinanza.

    - El programa debe generar un número aleatorio entre 1 y 100, y luego pedir al usuario que intente adivinar el número.

    - Utiliza la función rand() para generar el número aleatorio.

    - El programa debe seguir pidiendo números hasta que el usuario adivine el número correcto.

    - Utiliza un bucle do-while para este propósito.

    - Registra el número de intentos en una variable y muestra al usuario cuántos intentos lleva.

    - Debes verificar si el número ingresado por el usuario es mayor o menor que el número aleatorio y mostrar un mensaje.*/

    if(!defined('STDIN')) {
        define('STDIN', fopen('php://stdin', 'r'));
    };

    /*Se define la variable para el número secreto. */
    $aleatorio = rand(1, 100);
    
    /*Se define acumulador para el número de intentos. */
    $intentos = 0;
    echo "Tienes que adivinar un número entre el 1 y el 100.\n";

    do {         
        echo "Dime un número.\n";
        fscanf(STDIN, '%d', $numeroUsuario);
        $numeroUsuario = trim($numeroUsuario);
        $intentos++;//El acumulador situado en el lugar justo para contar los intentos.

        //Con un if/elseif abarcamos todas las opciones.
        if ($numeroUsuario > $aleatorio) {
            echo "Tu número es mayor que el número secreto. Llevas $intentos intento/s.\n";                
        } elseif ($numeroUsuario < $aleatorio) {
            echo "Tu número es menor que el número secreto. Llevas $intentos intento/s.\n";                
        } else {
            echo "¡Enhorabuena! Has adivinado el número secreto, era el $aleatorio. Lo has adivinado en $intentos intentos.\n"; 
        }       

    } while ($aleatorio != $numeroUsuario);//Salida del programa cuando el número del usuario es igual al aleatorio.

    