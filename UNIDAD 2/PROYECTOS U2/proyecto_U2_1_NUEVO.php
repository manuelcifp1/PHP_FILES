<?php
/*Escribe un programa en PHP que simule un menú interactivo en el cual el usuario pueda elegir realizar varias operaciones
 con una lista de números. El programa debe tener las siguientes opciones:
    - Agregar un número a la lista.
    - Mostrar los números de la lista.
    - Calcular el promedio de los números.
    - Salir.

El programa debe utilizar:
    - Un bucle do-while para mantener el menú activo hasta que el usuario elija "Salir".
    - Una sentencia switch para procesar cada opción del menú.
    - Un ciclo while para recorrer y mostrar los números en la lista.

Nota:
    - Usa un array para almacenar los números.
    - En la opción de calcular el promedio, recorre el array para sumar los números y dividir entre la cantidad de elementos.

AMPLIACIÓN:==================================================================================================================

Modifica el programa anterior para incluir verificaciones adicionales . Estas verificaciones deben hacer lo siguiente:
    - Si el usuario intenta agregar un número que ya está en la lista, el programa debe mostrar un mensaje de advertencia utilizando  if.
    - Al mostrar los números, si la lista está vacía, se debe usar un if para indicarlo.
    - Cuando se calcule el promedio, si el promedio es mayor que 10, se debe mostrar un mensaje usando un if que diga
     "El promedio es mayor que 10". Si es igual a 10, debe decir "El promedio es exactamente 10". Si es menor,
      debe decir "El promedio es menor que 10" usando elseif y else.*/

if(!defined('STDIN')) {
    define('STDIN', fopen('php://stdin', 'r'));
}

/*Array de números vacio. */
$numeros = [];

do {
    
    echo "Elija una opción (pero deberías empezar agregando varios números a la lista, ahora está vacía): \n
    A.- Agregar un número a la lista.\n
    B.- Mostrar los números de la lista.\n
    C.- Calcular el promedio de los números.\n
    D.- Salir.\n";
    fscanf(STDIN, '%s', $opcion);
    $opcion = trim(strtoupper($opcion));//En este caso, hacemos trim y strtoupper porque las opciones son letras mayúsculas.

    switch($opcion) {
        /*==============================================================*/
        case "A":
        echo "Dame un número para agregar\n";
        fscanf(STDIN, '%d', $numeroUsuario);
            
        foreach($numeros as $numero) {
            if ($numeroUsuario == $numero) {
                echo "Este número ya está en la lista pero lo agrego, no te preocupes.\n";                
            }            
        }
        $numeros[] = $numeroUsuario;
        break;
        /*===============================================================*/
        case "B":
        $i = 0;
        $cantidad = count($numeros);

        if($cantidad == 0) {
            echo "La lista está vacia.\n";
        } else {
            echo "Estos son los números de la lista: \n";
            //El while muestra los números mientras $i sea menor (empieza por 0, como los índices del array) que el total de elementos del array.            
            while ($cantidad > $i) {
                echo $numeros[$i] . "\n";
                $i++;
            }
        }
        break;
        /*===================================================================*/
        case "C":
        $cantidad = count($numeros);//El número de elementos del array para dividir el total de la suma de los números.
        $sumatorio = 0;//Un sumatorio para ir sumando los números del array.

        foreach($numeros as $numero) {
            $sumatorio += $numero;
        }
        $promedio = $sumatorio / $cantidad;
        echo "El promedio de la lista es : $promedio\n";

        if ($promedio > 10) {
            echo "El promedio es mayor que 10.\n";
        } elseif($promedio == 10) {
            echo "El promedio es igual a 10.\n";
        } else {
            echo "El promedio es menor que 10.\n";
        }
        break;
        /*==================================================================*/
        default:
        break;
    }

} while($opcion != "D");    
