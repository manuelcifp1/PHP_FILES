<?php
require_once "Pieza.php";

class Reina extends Pieza { 
    public function __construct(string $color, string $posicion) {
        parent::__construct($color, $posicion);
    } 

    public function mover(string $posicion): void {        
        $this->posicion = $posicion;
    }
    
    public function capturar(): void {        
        $this->posicion = null;
    } 
    public static function crearReinasIniciales(): array {
        return [
            new Reina("blanco", "d1"),            
            new Reina("negro", "d8"),            
        ];
    }
}


?>