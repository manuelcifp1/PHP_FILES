<?php

require_once "Carta.php";
class Mazo {
    private array $cartas = [];

    public function __construct() {
        $palos = ["Espadas", "Copas", "Oros", "Bastos"];
        $valores = range(1, 7); // Solo del 1 al 7

        foreach ($palos as $palo) {
            foreach ($valores as $valor) {
                $this->cartas[] = new Carta((string)$valor, $palo);
            }
        }
    }

    public function barajar(): void {
        shuffle($this->cartas);
    }

    public function repartir(): ?Carta {
        return array_pop($this->cartas);
    }

    public function quitar_carta(Carta $carta): void {
        foreach ($this->cartas as $i => $c) {
            if ($c->es_igual($carta)) {
                unset($this->cartas[$i]);
                $this->cartas = array_values($this->cartas);
                break;
            }
        }
    }

    public function getCartas(): array {
        return $this->cartas;
    }
}


?>