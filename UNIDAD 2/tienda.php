<?php
/* */

$tienda = [
    "nombre"=>"pcComponentes",
    "productos"=>["tele", "pc", "smartphone"]
];

echo "Nombre de la tienda: " . $tienda["nombre"] . "\n";

echo $tienda["productos"][1];