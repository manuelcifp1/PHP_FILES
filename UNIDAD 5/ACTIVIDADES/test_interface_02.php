<?php
/*Ejercicio: Polimorfismo con interfaz Operacion
Partimos del ejercicio anterior, pero ahora vamos a aplicar polimorfismo
 con un array de operaciones:

Usa la interfaz Operacion tal como la tienes.

Usa también las clases Suma y Multiplicacion que implementan esa interfaz.

Crea un array llamado $operaciones que contenga objetos de tipo Suma y Multiplicacion.

Recorre ese array con un foreach y en cada iteración:

Llama a calcular(10, 4)

Muestra el resultado, indicando de qué tipo de operación se trata (usa get_class($objeto) para mostrar la clase)  */

interface Operacion {
    public function calcular($a,$b);

}

class Suma implements Operacion {
    public function calcular($a, $b) {
        return $a + $b;
    }
}

class Multiplicacion implements Operacion {
    public function calcular($a, $b) {
        return $a * $b;
    }
}

$suma2= new Suma;

$multi2 = new Multiplicacion;


$numeros = [$suma2, $multi2];

foreach($numeros as $objeto) {
   $resultado = $objeto->calcular(10, 4); 
   echo "La operacion es " . get_class($objeto) . " y el resultado es :" . $resultado . "<br>";
}


?>