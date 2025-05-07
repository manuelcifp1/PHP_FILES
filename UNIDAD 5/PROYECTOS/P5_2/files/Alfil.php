<?php
require_once "Pieza.php";

class Alfil extends Pieza {
    
    public function __construct(string $color, string $posicion) {
        parent::__construct($color, $posicion);
    }    
     
     public function mover(string $posicion): void {        
        $this->posicion = $posicion;
    }
    
    public function capturar(): void {        
        $this->posicion = null;
    }  

    public static function crearAlfilesIniciales(): array {
        return [
            new Alfil("blanco", "c1"),
            new Alfil("blanco", "f1"),
            new Alfil("negro", "c8"),
            new Alfil("negro", "f8"),
        ];
    }
}


?>