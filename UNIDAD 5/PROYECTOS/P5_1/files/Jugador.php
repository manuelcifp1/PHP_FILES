<?php
//Usamos a la clase carta en este script.
require_once "Carta.php";

//Clase Jugador: representa a un jugador con nombre y cartas en la mano (propiedades).
class Jugador {
    private string $nombre;
    private array $mano = []; //La mano, que es un array de objetos Carta. Se llenará al recibir cartas.

    //Constructor con el nombre del jugador.
    public function __construct(string $nombre) {
        $this->nombre = $nombre;
    }

    /*Recibe una carta y la añade a la mano. Este método y el siguiente tienen
     tipado de parámetro, que nos asegura que reciba un objeto de la clase Carta.*/
    public function recibir_carta(Carta $carta): void {
        $this->mano[] = $carta;
    }

    //Juega una carta (la quita de la mano si existe).
    public function jugar_carta(Carta $carta): void {
        foreach ($this->mano as $i => $c) {
            if ($c->es_igual($carta)) {
                unset($this->mano[$i]);
                $this->mano = array_values($this->mano); //Reindexa la mano por la pérdida de indice provocada por unset().
                return;
            }
        }
    }

    //Muestra la mano (array de objetos Carta).
    public function mostrar_mano(): array {
        return $this->mano;
    }

    //Getter del nombre del jugador.
    public function getNombre(): string {
        return $this->nombre;
    }
}
