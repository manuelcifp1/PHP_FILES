<?php
/*Crea una clase llamada CuentaBancaria con propiedades privadas $titular (nombre del titular)
 y $saldo (saldo de la cuenta).
- La clase CuentaBancaria debe tener métodos ingresar($cantidad), retirar($cantidad) y mostrarSaldo()
 para gestionar los fondos de la cuenta.
- Crea una clase llamada CuentaAhorro que herede de CuentaBancaria y tenga una propiedad protegida
 $tasaInteres, que será el porcentaje de interés anual de la cuenta de ahorro.
- La clase CuentaAhorro debe tener un método calcularIntereses() que calcule el interés ganado sobre
 el saldo de la cuenta de ahorro, basado en la tasa de interés.
- En el script principal, crea una instancia de CuentaBancaria y una instancia de CuentaAhorro,
 luego llama a los métodos correspondientes para realizar ingresos, retiros y mostrar la información de la cuenta. */


class CuentaBancaria {
    private string $titular;
    private float $saldo;

    public function __construct($titular, $saldo) {
        $this->titular = $titular;
        $this->saldo = $saldo;
    }

    public function getSaldo() {
        return $this-> saldo;
    }

    public function setSaldo($nuevoSaldo) {
        $this->saldo = $nuevoSaldo;        
    }

    public function getTitular() {
        return $this->titular;
    }

    public function setTitular($nuevoTitular) {
        $this->titular = $nuevoTitular;        
    }

    public function ingresar($cantidad) {        
        echo "<p>Su saldo actual es de " . $this->saldo . "€</p>";
        return $this->saldo += $cantidad;

    }

    public function retirar($cantidad) {
        if($cantidad > $this->saldo) {
            return "<p>No dispone de suficiente saldo.</p>"; 
        } else {
            echo "<p>Su saldo actual es de " . $this->saldo . "€</p>";
            return $this->saldo -= $cantidad;             
        }

    }

    public function mostrarSaldo($titular) {
        return "<p>Su saldo actual es de " . $titular->__getSaldo() . "€</p>";
    }
} 

class CuentaAhorro extends CuentaBancaria {
    protected float $tasaInteres;

    public function __construct($titular, $saldo, $tasaInteres) {
        parent::__construct($titular, $saldo);
        $this->tasaInteres = $tasaInteres;
    }

    public function setTasaInteres($nuevaTasa) {
        $this->tasaInteres = $nuevaTasa;
    }

    public function getTasaInteres() {
        return $this->tasaInteres;
    }

    public function calcularIntereses() {
        $intereses = ($this->getSaldo() * $this->getTasaInteres()) / 100;
        return $intereses;
    }

}
?>