<?php
/*Actividad: Calcular el impuesto sobre la renta basado en el salario bruto.
Enunciado:
Crea un programa en PHP que calcule el impuesto sobre la renta de una persona basado en su salario anual.
Las reglas de impuestos son las siguientes:
● Si el salario es menor o igual a 20,000€, no paga impuestos.
● Si el salario está entre 20001€ y 40000€, paga un 10% de impuesto.
● Si el salario está entre 40001€ y 60000€, paga un 20% de impuesto.
● Si el salario es mayor a 60000€, paga un 30% de impuesto.
El programa debe calcular la cantidad a pagar en impuestos y el salario después de impuestos (Neto).*/

$salarioBruto = 48700;
$salarioNeto = 0;
$impuestos = 0;

if ($salarioBruto > 60000) {
    $impuestos = $salarioBruto * 0.3;    
    echo "Impuestos: $impuestos <br>";
    echo "Salario neto: " . $salarioBruto - $impuestos . "<br>";
} elseif ($salarioBruto <= 60000 && $salarioBruto >= 40001) {
    $impuestos = $salarioBruto * 0.2;    
    echo "Impuestos: $impuestos <br>";
    echo "Salario neto: " . $salarioBruto - $impuestos . "<br>";
} elseif