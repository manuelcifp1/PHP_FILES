<?php
require_once "Carta.php";

//Clase Mazo: contiene todas las cartas del juego
class Mazo {
    private array $cartas = [];

    //Constructor: genera las 28 cartas (valores 1 al 7 en 4 palos)
    public function __construct() {
        $palos = ["Espadas", "Copas", "Oros", "Bastos"];
        $valores = [1, 2, 3, 4, 5, 6, 7];

        foreach ($palos as $palo) {
            foreach ($valores as $valor) {
                $this->cartas[] = new Carta((string)$valor, $palo);
            }
        }
    }

    //Mezcla el mazo aleatoriamente
    public function barajar(): void {
        shuffle($this->cartas);
    }

    //Reparte una carta (la última del array)
    public function repartir(): ?Carta {
        return array_pop($this->cartas);
    }

    //Elimina una carta específica del mazo
    public function quitar_carta(Carta $carta): void {
        foreach ($this->cartas as $i => $c) {
            if ($c->es_igual($carta)) {
                unset($this->cartas[$i]);
                $this->cartas = array_values($this->cartas); // Reindexa el array
                break;
            }
        }
    }
}
