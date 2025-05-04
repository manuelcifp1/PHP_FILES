<?php
require_once "vehiculos.php";

$coche = new Coche();
echo $coche->moverse() . "<br>";
echo $coche->claxon() . "<br>";
echo $coche->detenerse() . "<br><br>";

$bici = new Bicicleta();
echo $bici->moverse() . "<br>";
echo $bici->timbre() . "<br>";
echo $bici->detenerse() . "<br>";


?>