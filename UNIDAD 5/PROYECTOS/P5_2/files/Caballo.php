<?php
require_once "Pieza.php";

class Caballo extends Pieza {
    public function __construct(string $color, string $posicion) {
        parent::__construct($color, $posicion);
    }
     
     public function mover(string $posicion): void {        
        $this->posicion = $posicion;
    }
    
    public function capturar(): void {        
        $this->posicion = null;
    }  

    public static function crearCaballosIniciales(): array {
        return [
            new Caballo("blanco", "b1"),
            new Caballo("blanco", "g1"),
            new Caballo("negro", "b8"),
            new Caballo("negro", "g8"),
        ];
    }
}


?>