<?php
/*1.Escribe un script en PHP que determine si una persona puede votar o no.
    Si la edad de la persona es mayor o igual a 18, debe mostrar el mensaje "Puedes votar".*/
echo "Ejercicio 1<br>";    
$edad = 20;    
$votante = ($edad >= 18) ? "Puede votar" : "";
echo $votante;
echo "<br>";
/*2.Crea un script en PHP que verifique si un número es positivo o negativo.
    Si el número es positivo, debe mostrar el mensaje "El número es positivo".
    De lo contrario, debe mostrar "El número es negativo".*/
echo "Ejercicio 2<br>";    
$numero = -4;
if ($numero > 0) {
    echo "El número es positivo<br>";
} else {
    echo "El número es negativo<br>";
}   
/*3.Realiza un programa en PHP que clasifique una nota según la siguiente escala:
Si la nota es mayor o igual a 90, muestra "Sobresaliente".
Si la nota está entre 80 y 89, muestra "Notable".
Si la nota está entre 70 y 79, muestra "Aprobado".
Si la nota es menor a 70, muestra "Suspenso".*/
echo "Ejercicio 3<br>";
$nota = 70.3;
if ($nota >= 90) {
    echo "Sobresaliente<br>";
} elseif ($nota >= 80) {
    echo "Notable<br>";
} elseif ($nota >= 70) {
    echo "Aprobado<br>";
} else {
    echo "Suspenso<br>";
}
/*4.Crea un programa que recomiende una película basada en la edad del usuario. El sistema debe funcionar de la siguiente manera:
    Si el usuario tiene menos de 13 años, recomienda una película para niños.
    Si el usuario tiene entre 13 y 17 años, recomienda una película para adolescentes.
    Si el usuario tiene entre 18 y 35 años, recomienda una película de acción o ciencia ficción.
    Si el usuario tiene más de 35 años, recomienda una película clásica.*/
echo "Ejercicio 4<br>";
$edadUsuario = 23;
if ($edadUsuario >35) {
    echo "Te recomiendo una película clásica.<br>";
} elseif ($edadUsuario >= 18) {
    echo "Te recomiendo una película de acción o ciencia ficción.<br>";
} elseif ($edadUsuario >= 13) {
    echo "Te recomiendo una película para adolescentes.<br>";
} else {
    echo "Te recomiendo una película para niños.<br>";
}

/*5.Escribe un programa que clasifique la temperatura de acuerdo con las siguientes reglas:
    Si la temperatura es menor que 0 grados, muestra "Congelante".
    Si la temperatura está entre 0 y 10 grados, muestra "Frío".
    Si la temperatura está entre 11 y 20 grados, muestra "Templado".
    Si la temperatura está entre 21 y 30 grados, muestra "Cálido".
    Si la temperatura es mayor a 30 grados, muestra "Caluroso".
    Además, si la temperatura es negativa, debe agregar el mensaje "Precaución: temperaturas bajo cero".*/    
echo "Ejercicio 5<br>";
$temperatura = -1;
if ($temperatura > 30) {
    echo "Caluroso<br>";
} elseif ($temperatura >= 21) {
    echo "Cálido<br>";
} elseif ($temperatura >= 11) {
    echo "Templado<br>";
} elseif ($temperatura >= 0) {
    echo "Frío<br>";
} else {
    echo "Congelante. Precaución: temperaturas bajo cero<br>";
}
/*6.Desarrolla un programa en PHP que actúe como una calculadora básica.
 El programa debe recibir dos números y un operador (suma, resta, multiplicación o división).
  Dependiendo del operador, debe realizar la operación correspondiente. Considera lo siguiente:
    Si el operador es +, debe sumar los números.
    Si el operador es -, debe restarlos.
    Si el operador es *, debe multiplicarlos.
    Si el operador es /, debe dividirlos, pero verifica que el divisor no sea 0.
    Si se introduce un operador inválido, debe mostrar un mensaje de error.*/
echo "Ejercicio 6<br>";
$numUno = 3;
$numDos = 0;
$operador = "/";

if ($operador == "+") {
    echo $numUno + $numDos . "<br>";
} elseif ($operador == "-") {
    echo $numUno - $numDos . "<br>";
} elseif ($operador == "*") {
    echo $numUno * $numDos . "<br>";
} elseif ($operador == "/") {
    if($numDos != 0){
        echo $numUno / $numDos . "<br>";
    }else{
        echo "Error";
    }
}
else{
    echo "Operador inválido<br>";
}
/*7.Desarrolla un sistema de evaluación de desempeño para empleados que siga las siguientes reglas:
    Si el puntaje es mayor o igual a 90, el empleado recibe una calificación de "Excelente".
    Si el puntaje está entre 80 y 89, recibe "Muy bueno".
    Si el puntaje está entre 70 y 79, recibe "Bueno".
    Si el puntaje está entre 60 y 69, recibe "Regular".
    Si el puntaje es menor a 60, recibe "Insuficiente".
    Además, si la calificación es "Insuficiente", agrega el mensaje "Necesita mejorar su rendimiento".*/    
echo "Ejercicio 7<br>";
$puntaje = 70.6;
if ($puntaje >= 90) {
    echo "Excelente<br>";
} elseif ($puntaje >= 80) {
    echo "Muy bueno<br>";
} elseif ($puntaje >= 70) {
    echo "Bueno<br>";
} elseif ($puntaje >= 60) {
    echo "Regular<br>";
} elseif ($puntaje < 60) {
    echo "Insuficiente. Necesita mejorar su rendimiento<br>";
}