<?php
require_once "Carta.php";
require_once "Mazo.php";
require_once "Jugador.php";

class Juego {
    private array $jugadores = [];
    private Mazo $mazo;
    private int $turno = 0;

    public function __construct(array $nombresJugadores) {
        foreach ($nombresJugadores as $nombre) {
            $this->jugadores[] = new Jugador($nombre);
        }

        $this->mazo = new Mazo();
        $this->mazo->barajar();
    }

    public function iniciar_juego(int $cartasPorJugador = 3): void {
        for ($i = 0; $i < $cartasPorJugador; $i++) {
            foreach ($this->jugadores as $jugador) {
                $carta = $this->mazo->repartir();
                if ($carta !== null) {
                    $jugador->recibir_carta($carta);
                }
            }
        }
    }

    public function cambiar_turno(): void {
        $this->turno = ($this->turno + 1) % count($this->jugadores);
    }

    public function finalizar_juego(): void {
        echo "<p>El juego ha terminado.</p>";
    }

    public function getJugadores(): array {
        return $this->jugadores;
    }

    public function getTurnoActual(): Jugador {
        return $this->jugadores[$this->turno];
    }

    public function getMazo(): Mazo {
        return $this->mazo;
    }
}
