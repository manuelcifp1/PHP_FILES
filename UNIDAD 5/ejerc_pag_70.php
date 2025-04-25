<?php
interface Vehiculos {
    public function moverse():string;
    public function detenerse():string;
}

class Patinete implements Vehiculos {    

    public function moverse() {
        echo "Está en movimiento";
    }

    public function detenerse() {
        echo "Está detenido";

    }

}

abstract class ConClaxon implements Vehiculos {
    protected function tocarClaxon():string {
        echo "Piiiiii!!";
    }
}

?>