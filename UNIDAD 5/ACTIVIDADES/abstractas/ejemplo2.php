<?php
abstract class ClaseAbstracta {
    abstract protected function metodoAbstracto();
}

abstract class ClaseIntermedia extends ClaseAbstracta {
    // No es necesario implementar el método abstracto aquí porque esta clase también es abstracta
}

class ClaseConcreta extends ClaseIntermedia {
    // Ahora sí es obligatorio implementar el método abstracto
    protected function metodoAbstracto() {
        echo "Implementación final del método abstracto.";
    }
}

$instancia = new ClaseConcreta();
$instancia->metodoAbstracto(); // Salida: Implementación final del método abstracto.
?>