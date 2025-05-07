<?php
//En todas las clases hijas de Pieza debemos requerir el script donde está su padre.
require_once "Pieza.php";

class Rey extends Pieza {
    /*Explico sólo aquí en la clase Rey la estructura general que tiene cada tipo de pieza,
    ya que es común a todas.

    - Primero reutilizamos el construct del padre, que combinado con un método estático,
    instanciará cada pieza, otorgándole sus 2 propiedades heredadas del padre, 
    color y posición (que será la posición inicial en el tablero según las coordenadas
    habituales de un tablero de ajedrez (ver imagen adjunta))

    - Luego definimos los 2 métodos abstractos de la clase padre Pieza.
    
    - Finalmente, definimos su método estático que será usado en el construct de Juego para 
    poder empezar la partida.*/    

    public function __construct(string $color, string $posicion) {
        parent::__construct($color, $posicion);
    }
    //Implementación del método mover
    public function mover(string $posicion): void {
        //Actualizamos la propiedad con la nueva posición.
        $this->posicion = $posicion;
    }

    //Implementación del método capturar
    public function capturar(): void {
        //Una pieza capturada pierde su posición al salir del tablero.
        $this->posicion = null;
    } 
    
    //El método estático mencionado antes.
    public static function crearReyesIniciales(): array {
        return [
            new Rey("blanco", "e1"),            
            new Rey("negro", "e8"),            
        ];
    }
}


?>