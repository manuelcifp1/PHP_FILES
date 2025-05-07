<?php
/*Aquí creamos la clase CasillaVacia para gestionar la casilla que
 se queda vacía tras un movimiento.
 Me gustaría mencionar que los métodos que CasillaVacia está obligada a definir
 como hija de Pieza tienen el cuerpo vacío ¿Por qué? Porque esta clase no necesita usarlos,
 pero al definirlos así, cumple perfectamente el "contrato de definición abstracto" que tiene
 con su papi. ¿Curioso verdad? */
require_once "Pieza.php";

class CasillaVacia extends Pieza {
    public function mover(string $posicion): void {
        //No hace nada
    }

    public function capturar(): void {
        //No hace nada
    }
}
