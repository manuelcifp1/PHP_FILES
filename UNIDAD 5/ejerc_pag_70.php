<?php
interface Vehiculos {
    public function moverse():string;
    public function detenerse():string;
}

class Patinete implements Vehiculos {    

    public function moverse() {
        return "Está en movimiento";
    }

    public function detenerse() {
        return "Está detenido";

    }

}

abstract class ConClaxon implements Vehiculos {
    public function tocarClaxon():string {
       
    }
}

class coche extends ConClaxon {
    public function tocarClaxon() {
        return "Honk!!";
    }
}

?>