<?php
echo "Enésimo número de la lista de Fibonacci (cada número es la suma de los 2 anteriores)<br><br>";

function fibonacci($n) {
    // Casos base: 
    // Si n es 0, devuelve 0 (primer elemento de la secuencia).
    // Si n es 1, devuelve 1 (segundo elemento de la secuencia).
    if ($n < 2) {
        return $n;
    }
    
    // Paso recursivo: 
    // El n-ésimo número es la suma de los dos anteriores.
    return fibonacci($n - 1) + fibonacci($n - 2);
}

// Ejemplo de uso: Mostrar el 10º número de Fibonacci
echo "El 10º número de Fibonacci es: <br><br>" . fibonacci(10);

//================================================================

echo "Factorial de un número (la multiplicación de todos los anteriores)<br><br>";

function factorial($n) {
    if ($n == 1) {
        return 1; // Caso base: 1! y 0! se consideran 1.
    }
    return $n * factorial($n - 1); // Paso recursivo.
}
echo "5! = " . factorial(5) . "<br><br>"; // Imprime 120

//=====================================================================

echo "Potencia (base, exponente)";

function potencia ($base, $exponente) {
    if ($exponente == 0) {
        return 1;
    } else {
        return $base * potencia($base, $exponente - 1);
    }
}

echo "5 elevado a 5 es igual a: " . potencia(5, 5) . "<br><br>";

//==============================================================================

echo "Suma de los elementos de un array<br><br>";
function sumArray($array) {
    if (empty($array)) {
        return 0; // Caso base: si el array está vacío, la suma es 0.
    }
    // Extrae el primer elemento y suma al resultado de sumar el resto del array.
    return array_shift($array) + sumArray($array);
}
echo "Suma: " . sumArray([1, 2, 3, 4]) . "<br><br>"; // Imprime 10

//==================================================================================

echo "Crear una función que reciba un número entero N y retorne la suma de todos los números
 desde 1 hasta N.<br><br>";

function sumarNumeros($n) {
    if ($n == 1) {
        return 1;
    } else {
        return $n + sumarNumeros($n - 1);
    }
} 

echo "Si el número es 5, la suma de él y los anteriores es: " . sumarNumeros(5) . "<br><br>";
    