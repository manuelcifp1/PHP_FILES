<?php
//Cargamos la clase Juego (y con ella, todas las demás clases necesarias ya que están requeridas en ese archivo)
require_once "Juego.php";

//1. Iniciar el juego con dos jugadores
$juego = new Juego(["Ana", "Luis"]);

//2. Repartir cartas a los jugadores (por defecto 3 a cada uno)
$juego->iniciar_juego();

// 3. Mostrar la mano de cada jugador
foreach ($juego->getJugadores() as $jugador) {
    echo "<h3>Cartas de " . $jugador->getNombre() . ":</h3>";

    foreach ($jugador->mostrar_mano() as $carta) {
        echo $carta->mostrar() . "<br>";
    }
}

//4. Mostrar de quién es el turno actual
$jugadorActual = $juego->getTurnoActual();
echo "<h3>Turno de: " . $jugadorActual->getNombre() . "</h3>";

//5. El jugador actual juega su primera carta (si tiene)
$mano = $jugadorActual->mostrar_mano();

if (!empty($mano)) {
    $cartaAJugar = $mano[0]; //Se selecciona la primera carta de la mano
    $jugadorActual->jugar_carta($cartaAJugar); //Se juega (elimina de la mano)

    echo "<p>" . $jugadorActual->getNombre() . " juega: " . $cartaAJugar->mostrar() . "</p>";
}

// 6. Cambiar al siguiente jugador (solo para mostrarlo, ya que no hay interfaz interactiva)
$juego->cambiar_turno();
echo "<p>Ahora es el turno de: " . $juego->getTurnoActual()->getNombre() . "</p>";

// 7. Finalizar el juego (como marca el flujo del enunciado)
$juego->finalizar_juego();
?>
