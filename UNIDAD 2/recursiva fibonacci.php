<?php
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
echo "El 10º número de Fibonacci es: " . fibonacci(10);
    