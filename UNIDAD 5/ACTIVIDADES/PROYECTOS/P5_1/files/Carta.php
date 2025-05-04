<?php

class Carta {
    private string $valor; // "1" al "7"
    private string $palo;  // "Espadas", "Copas", "Oros", "Bastos"

    public function __construct(string $valor, string $palo) {
        $this->valor = $valor;
        $this->palo = $palo;
    }

    // Muestra: "3 de Copas", "7 de Bastos", etc.
    public function mostrar(): string {
        return $this->valor . " de " . $this->palo;
    }

    // Compara si dos cartas son iguales (valor y palo)
    public function es_igual(Carta $otraCarta): bool {
        return $this->valor === $otraCarta->valor && $this->palo === $otraCarta->palo;
    }

    // Getters opcionales (útiles para debug o visualización)
    public function getValor(): string {
        return $this->valor;
    }

    public function getPalo(): string {
        return $this->palo;
    }
}
