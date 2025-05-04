<?php

// Definimos una interfaz base
interface Vehiculo {
    public function arrancar();
    public function detener();
}

// Definimos una interfaz que hereda de Vehiculo
interface Electrico extends Vehiculo {
    public function cargarBateria();
}

// Clase que implementa la interfaz Electrico
class CocheElectrico implements Electrico {
    public function arrancar() {
        echo "El coche eléctrico ha arrancado.\n";
    }

    public function detener() {
        echo "El coche eléctrico se ha detenido.\n";
    }

    public function cargarBateria() {
        echo "Cargando la batería del coche eléctrico.\n";
    }
}

// Crear una instancia de la clase
$coche = new CocheElectrico();
$coche->arrancar();
$coche->detener();
$coche->cargarBateria();
?>

