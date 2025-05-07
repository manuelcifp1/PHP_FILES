<?php
/*Aquí en index, centralizamos los requerimientos a todas la clases,
creando así una red de archivos enlazados.*/
require_once "Alfil.php";
require_once "Caballo.php";
require_once "Juego.php";
require_once "Jugador.php";
require_once "Peon.php";
require_once "Pieza.php";
require_once "Reina.php";
require_once "Rey.php";
require_once "Tablero.php";
require_once "Torre.php";
require_once "CasillaVacia.php";


//1. Creamos una nueva instancia del juego (esto también crea y coloca las piezas).
$juego = new Juego();

//2. Mostramos el tablero con todas las piezas colocadas inicialmente.
echo "<h2>Tablero inicial</h2>";
$juego->getTablero()->mostrarTablero();

//3. Mostramos de quién es el turno actual (siempre empieza el jugador blanco).
echo "<h3>Turno de: " . $juego->getJugadorEnTurno()->getColor() . "</h3>";

//4. Realizamos un movimiento con el método jugarMovimiento() de la clase Juego. En este caso, movemos el peón blanco de a2 a a3.
$juego->jugarMovimiento("a2", "a3");

//5. Mostramos el tablero después del movimiento.
echo "<h2>Tablero después del movimiento</h2>";
$juego->getTablero()->mostrarTablero();
?>
