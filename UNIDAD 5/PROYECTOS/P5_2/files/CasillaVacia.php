<?php
/*Aquí creamos la clase CasillaVacia para gestionar la casilla que
 se queda vacía tras un movimiento*/
require_once "Pieza.php";

class CasillaVacia extends Pieza {
    public function mover(string $posicion): void {
        // No hace nada
    }

    public function capturar(): void {
        // No hace nada
    }
}
