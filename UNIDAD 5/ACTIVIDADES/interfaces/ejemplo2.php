<?php
//primero definir la interfaz
interface Figura {

public function calcularArea();

public function calcularPerimetro();
}

// después implementar la interfaz en una clase
class Cuadrado implements Figura {
private $lado;

public function __construct($lado) {
$this->lado = $lado; }

public function calcularArea() {
return $this->lado * $this->lado; }

public function calcularPerimetro() {
return 4 * $this->lado; }
}                                                                                                                                                         

// Crear una instancia de la clase Cuadrado
$cuadrado = new Cuadrado(5);

//por último Llamar a los métodos de la interfaz
echo "Área del cuadrado: " . $cuadrado->calcularArea() . "<br>";
echo "Perímetro del cuadrado: " . $cuadrado->calcularPerimetro() . "<br>";
?>