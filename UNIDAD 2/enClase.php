<?php
/*Crea un array frutas (manzana, fresa, banana, naranja) */

$frutas = array ("manzana", "fresa", "banana", "naranja");

unset($frutas[1]);

foreach ($frutas as $fruta) {
    echo "Fruta: " . $fruta;
}