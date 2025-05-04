<?php
//Requerimos todos los archivos aquí.
require_once "Carta.php";
require_once "Mazo.php";
require_once "Jugador.php";

//Clase Juego: controla el flujo del juego
class Juego {
    private array $jugadores = [];  //Lista de jugadores
    private Mazo $mazo;             //El mazo del juego
    private int $turno = 0;         //Índice del jugador actual

    //Constructor: recibe nombres de jugadores y crea el mazo
    public function __construct(array $nombresJugadores) {
        foreach ($nombresJugadores as $nombre) {
            $this->jugadores[] = new Jugador($nombre);
        }
        //Aquí se crea el mazo (usando su constructor) y se baraja el mismo.
        $this->mazo = new Mazo();
        $this->mazo->barajar();
    }

    //Reparte X cartas a cada jugador (por defecto 3)
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

    //Cambia el turno al siguiente jugador
    public function cambiar_turno(): void {
        $this->turno = ($this->turno + 1) % count($this->jugadores);
    }

    //Finaliza el juego
    public function finalizar_juego(): void {
        echo "<p>El juego ha terminado.</p>";
    }

    //Devuelve todos los jugadores
    public function getJugadores(): array {
        return $this->jugadores;
    }

    //Devuelve el jugador del turno actual
    public function getTurnoActual(): Jugador {
        return $this->jugadores[$this->turno];
    }
    
}
