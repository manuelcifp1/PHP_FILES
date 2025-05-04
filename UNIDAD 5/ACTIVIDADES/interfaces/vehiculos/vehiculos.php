<?php
// Interfaz que obliga a moverse y detenerse
interface VehiculoInterface {
    public function moverse();
    public function detenerse();
}

// Clase abstracta que implementa un método común (claxon)
abstract class VehiculoBase implements VehiculoInterface {
    public function claxon() {
        return "¡Piiii!";
    }
}

// Vehículo que hereda claxon del padre
class Coche extends VehiculoBase {
    public function moverse() {
        return "El coche está en movimiento.";
    }

    public function detenerse() {
        return "El coche se ha detenido.";
    }
}

// Otro vehículo con claxon heredado
class Camion extends VehiculoBase {
    public function moverse() {
        return "El camión avanza lentamente.";
    }

    public function detenerse() {
        return "El camión se ha detenido.";
    }
}

// Vehículo que NO hereda el claxon
class Bicicleta implements VehiculoInterface {
    public function moverse() {
        return "La bicicleta avanza.";
    }

    public function detenerse() {
        return "La bicicleta se detiene.";
    }

    // No tiene claxon estándar, podría tener uno propio si se quiere
    public function timbre() {
        return "¡Ring ring!";
    }
}

?>