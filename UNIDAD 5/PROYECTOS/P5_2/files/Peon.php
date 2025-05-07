<?php
require_once "Pieza.php";

class Peon extends Pieza { 
    public function __construct(string $color, string $posicion) {
        parent::__construct($color, $posicion);
    } 

     public function mover(string $posicion): void {        
        $this->posicion = $posicion;
    }
    
    public function capturar(): void {        
        $this->posicion = null;
    }   

    public static function crearPeonesIniciales(): array {
        return [
            new Peon("blanco", "a2"),
            new Peon("blanco", "b2"),
            new Peon("blanco", "c2"),
            new Peon("blanco", "d2"),
            new Peon("blanco", "e2"),
            new Peon("blanco", "f2"),
            new Peon("blanco", "g2"),
            new Peon("blanco", "h2"),
            new Peon("negro", "a7"),
            new Peon("negro", "b7"),
            new Peon("negro", "c7"),
            new Peon("negro", "d7"),
            new Peon("negro", "e7"),
            new Peon("negro", "f7"),
            new Peon("negro", "g7"),
            new Peon("negro", "h7"),
        ];
    }
}


?>