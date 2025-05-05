<?php
//Cargamos la clase Juego (y con ella, todas las demás clases necesarias ya que están requeridas en ese archivo).
require_once "Juego.php";

//1. Iniciar el juego con dos jugadores usando el constructor de la clase Juego, cuyo parámetro debe ser un array de jugadores.
$juego = new Juego(["Manolo", "Sergio"]);

//2. Repartir cartas a los jugadores (por defecto 3 a cada uno)
$juego->iniciar_juego();

//3. Mostrar la mano inicial de cada jugador
foreach ($juego->getJugadores() as $jugador) {
    echo "<h3>Cartas de " . $jugador->getNombre() . ":</h3>";

    foreach ($jugador->mostrar_mano() as $carta) {
        echo $carta->mostrar() . "<br>";
    }

    echo "<hr>";
}

//4. Iniciar las rondas: se juegan automáticamente las 3 cartas, se comparan y se actualizan los puntos
$juego->jugar_rondas();
?>
