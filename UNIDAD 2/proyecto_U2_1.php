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
      Cuando se calcule el promedio, si el promedio es mayor que 10, se debe mostrar un mensaje usando un if que diga
     "El promedio es mayor que 10". Si es igual a 10, debe decir "El promedio es exactamente 10". Si es menor,
      debe decir "El promedio es menor que 10" usando elseif y else.*/