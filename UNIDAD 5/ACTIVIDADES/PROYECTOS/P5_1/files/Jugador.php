<?php

class Jugador {
    private string $nombre;
    private array $mano = []; // Array de objetos Carta

    public function __construct(string $nombre) {
        $this->nombre = $nombre;
    }

    // El jugador recibe una carta del mazo
    public function recibir_carta(Carta $carta): void {
        $this->mano[] = $carta;
    }

    // El jugador juega una carta (la elimina de su mano si la tiene)
    public function jugar_carta(Carta $carta): void {
        foreach ($this->mano as $i => $c) {
            if ($c->es_igual($carta)) {
                unset($this->mano[$i]);
                $this->mano = array_values($this->mano); // Reindexar
                return;
            }
        }
    }

    // Muestra las cartas que el jugador tiene en la mano
    public function mostrar_mano(): array {
        return $this->mano;
    }

    public function getNombre(): string {
        return $this->nombre;
    }
}
