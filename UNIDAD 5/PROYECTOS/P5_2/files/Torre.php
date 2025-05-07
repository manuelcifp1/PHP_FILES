<?php
require_once "Pieza.php";

class Torre extends Pieza {
    public function __construct(string $color, string $posicion) {
        parent::__construct($color, $posicion);
    }

     public function mover(string $posicion): void {        
        $this->posicion = $posicion;
    }
    
    public function capturar(): void {        
        $this->posicion = null;
    }
    
    public static function crearTorresIniciales(): array {
        return [
            new Torre("blanco", "a1"),
            new Torre("blanco", "h1"),
            new Torre("negro", "a8"),
            new Torre("negro", "h8"),
        ];
    }
}

?>