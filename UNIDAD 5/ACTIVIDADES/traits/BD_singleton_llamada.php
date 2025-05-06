<?php

require_once "ConexionBD.php";

// Obtenemos la instancia única
$bd = ConexionBD::getInstance();

// Usamos la conexión para hacer una consulta
$pdo = $bd->getConexion();
$stmt = $pdo->query("SELECT * FROM usuarios");

foreach ($stmt as $fila) {
    echo $fila["nombre"] . "<br>";
}
