<?php
//Clase Carta: representa una carta con valor y palo (baraja española del 1 al 7)
class Carta {
    private string $valor;
    private string $palo;

    //Constructor: con sus 2 atributos: valor y palo.
    public function __construct(string $valor, string $palo) {
        $this->valor = $valor;
        $this->palo = $palo;
    }

    //Devuelve un string como "3 de Oros".
    public function mostrar(): string {
        return "$this->valor de $this->palo";
    }

    /*Compara si dos cartas son exactamente iguales. Usaremos este método
     para poder eliminar del mazo la carta que se repartió
     o eliminar de la mano la carta que se jugó.*/
    public function es_igual(Carta $otraCarta): bool {
        return $this->valor === $otraCarta->valor && $this->palo === $otraCarta->palo;
    }

    //Getter para obtener el valor de una carta, necesario para la mecánica del juego.
    public function getValor(): string {
        return $this->valor;
    }

}
