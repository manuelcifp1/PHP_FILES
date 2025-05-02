<?php
require_once "01_clase_persona.php";

$persona1 = new Persona("Manolo", "Alba", "manalba", "1966-07-09");

$persona2 = new Persona("Lola", "Gálvez",  "cari", "1974-12-17");

$persona3 = new Persona("Sergio", "Alba", "chiki", "2014-03-30");


$persona3->saludar();
$persona2->saludar();
$persona1->saludar();
?>

