<?php
abstract class ClaseAbstracta {
    abstract protected function metodoAbstracto();
}

class ClaseConcreta extends ClaseAbstracta {
    // Obligatorio implementar este método
    protected function metodoAbstracto() {
        echo "Método abstracto implementado.";
    }
}

$instancia = new ClaseConcreta();
$instancia->metodoAbstracto(); // Salida: Método abstracto implementado.
?>