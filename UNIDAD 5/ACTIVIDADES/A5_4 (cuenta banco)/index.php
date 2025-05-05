<?php
require_once "cuentaBancaria.php";


$titularPedro = new CuentaBancaria("Pedro", 2000);
$titularPedro->ingresar(7000.35);
$titularPedro->retirar(500);
echo $titularPedro->getTitular() . " su saldo actual es de " .  $titularPedro->getSaldo() . "€";


$titularPablo = new CuentaAhorro("Pablo", 5000, 0.5);
$titularPablo->ingresar(23574.56);
$titularPablo->retirar(2570.10);
echo $titularPablo->getTitular() . " su saldo actual es de " .  $titularPablo->getSaldo() . "€<br><br>";

echo $titularPablo->getTitular() . " los intereses a percibir ascenderán a " . $titularPablo->calcularIntereses() . "€";

?>