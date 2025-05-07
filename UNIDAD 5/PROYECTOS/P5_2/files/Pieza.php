<?php
//Requerimos a interfaces.php, de donde Pieza obtiene las directrices de los 2 métodos que debe incluir en su clase.
require_once "interfaces.php";
/*Aquí, como sugiere el enunciado, creamos la clase abstracta Pieza que implementa las interfaces
Tiene las propiedades color y posición, que es todo lo que necesitamos para identificar a cada pieza.
Establece los 2 métodos que tendrán que definir sus hijas: mover y capturar.
También tiene un constructor que sus hijas usarán para instanciar cada pieza mediante sus respectivos métodos estáticos.
Finalmente, getters para las propiedades que necesitaremos más adelante. */
abstract class Pieza implements Movible, Capturable {

    protected $color;
    protected $posicion;
    
    abstract function mover(string $posicion):void;
    abstract function capturar():void;
    
    public function __construct($color, $posicion) {
        $this->color = $color;
        $this->posicion = $posicion;
    }

    public function getColor() {
        return $this->color;
    }

    public function getPosicion(): string {
        return $this->posicion;
    }
    
    
}

?>