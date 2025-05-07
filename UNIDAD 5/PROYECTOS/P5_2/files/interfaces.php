<?php
//Siguiendo las instrucciones del enunciado, creamos las 2 interfaces solicitadas.
interface Movible {
    public function mover(string $posicion): void;
}

interface Capturable {
    public function capturar();
}


?>