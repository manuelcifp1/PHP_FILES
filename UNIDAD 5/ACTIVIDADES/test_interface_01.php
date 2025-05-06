<?php
/*Ejercicio: Interfaces con operaciones matemáticas
Crea una interfaz Operacion que tenga un método:

public function calcular($a, $b);

Crea dos clases que implementen esa interfaz:

Suma: su método calcular() debe devolver la suma de $a + $b

Multiplicacion: su método calcular() debe devolver el producto de $a * $b

En el archivo principal:

Crea una instancia de Suma y otra de Multiplicacion

Llama a calcular(5, 3) en ambas e imprime los resultados */

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

$suma1 = new Suma;
$multi1 = new Multiplicacion;
echo $suma1->calcular(5, 3) . "<br>";
echo $multi1->calcular(5, 3) . "<br>";

?>