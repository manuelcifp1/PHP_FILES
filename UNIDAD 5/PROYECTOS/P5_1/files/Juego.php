<?php
//Requerimos todos los archivos aquí.
require_once "Carta.php";
require_once "Mazo.php";
require_once "Jugador.php";

//Clase Juego: controla el flujo del juego.
class Juego {
    private array $jugadores = [];  //Lista de jugadores.
    private Mazo $mazo;             //El mazo del juego.
    private int $turno = 0;         //Índice del jugador actual.
    private array $puntos = [];     //Array asociativo para llevar la puntuación de cada jugador.

    /*Constructor: recibe un array con los nombres de los jugadores y crea el array de jugadores usando un foreach.
    Después crea el mazo.*/
    public function __construct(array $nombresJugadores) {
        foreach ($nombresJugadores as $nombre) {
            $this->jugadores[] = new Jugador($nombre);
            $this->puntos[$nombre] = 0; //Inicializamos su puntuación a 0.
        }
        //Aquí se crea el mazo (usando su constructor) y se baraja el mismo.
        $this->mazo = new Mazo();
        $this->mazo->barajar();
    }

    //Reparte X cartas a cada jugador (por defecto 3). Método que devuelve void, ya que realiza una acción sin devolver nada.
    public function iniciar_juego(int $cartasPorJugador = 3): void {
        for ($i = 0; $i < $cartasPorJugador; $i++) {
            foreach ($this->jugadores as $jugador) {
                $carta = $this->mazo->repartir(); //Se elige una carta aleatoria del mazo.
                if ($carta !== null) {
                    $this->mazo->quitar_carta($carta); //Se elimina del mazo...
                    $jugador->recibir_carta($carta);   //...y se entrega al jugador.
                }
            }
        }
    }

    /*Ejecuta 3 rondas, siguiendo las reglas del juego:
    - Se reparten 3 cartas. En cada ronda, cada jugador pone una carta en la mesa.
    - Si una carta es mayor que la otra, el que la pone gana 2 puntos y el otro -1; si son iguales, ganan 1 punto cada uno.
    - Al jugar las 3 cartas, gana el que tenga más puntos. Pueden terminar en empate.*/
    public function jugar_rondas(): void {
        for ($i = 0; $i < 3; $i++) {
            $jugador1 = $this->jugadores[0];
            $jugador2 = $this->jugadores[1];

            $mano1 = $jugador1->mostrar_mano();
            $mano2 = $jugador2->mostrar_mano();

            $carta1 = $mano1[0];
            $carta2 = $mano2[0];

            $jugador1->jugar_carta($carta1);
            $jugador2->jugar_carta($carta2);

            echo "<p>" . $jugador1->getNombre() . " juega " . $carta1->mostrar() . "</p>";
            echo "<p>" . $jugador2->getNombre() . " juega " . $carta2->mostrar() . "</p>";

            $valor1 = (int)$carta1->getValor();
            $valor2 = (int)$carta2->getValor();

            if ($valor1 > $valor2) {
                $this->puntos[$jugador1->getNombre()] += 2;
                $this->puntos[$jugador2->getNombre()] -= 1;
            } elseif ($valor2 > $valor1) {
                $this->puntos[$jugador2->getNombre()] += 2;
                $this->puntos[$jugador1->getNombre()] -= 1;
            } else {
                $this->puntos[$jugador1->getNombre()] += 1;
                $this->puntos[$jugador2->getNombre()] += 1;
            }

            echo "<hr>";//Añadimos una línea de separación entre jugadas para mayor claridad.
        }

        $this->finalizar_juego(); //Al terminar las 3 rondas, finalizamos el juego.
    }

    /*Cambia el turno al siguiente jugador. $this->turno representa el índice del jugador actual.
    Con el + 1, seleccionamos al siguiente jugador. Con el módulo (%) y el número total de jugadores (count($this->jugadores)),
    lo que hacemos es garantizar que cuando pase del último jugador, regrese al primero para seguir el juego.

    En el ejemplo de index.php: 
    $this->turno = 0; Jugador Manolo.
    $this->turno = (0 + 1) % 2 = 1; Jugador Sergio.
    $this->turno = (1 + 1) % 2 = 2 % 2 = 0; Volvemos otra vez a Manolo. 
    Siempre funciona, independientemente del número de jugadores que tengamos.*/
    public function cambiar_turno(): void {
        $this->turno = ($this->turno + 1) % count($this->jugadores);
    }

    //Finaliza el juego mostrando la puntuación de cada jugador y quién ha ganado (o si hay empate).
    public function finalizar_juego(): void {
        echo "<h2>Resultado final:</h2>";
        foreach ($this->puntos as $nombre => $puntos) {
            echo "<p>$nombre: $puntos puntos</p>";
        }

        $valores = array_values($this->puntos);
        if ($valores[0] > $valores[1]) {
            echo "<p><strong>Gana " . $this->jugadores[0]->getNombre() . "!</strong></p>";
        } elseif ($valores[1] > $valores[0]) {
            echo "<p><strong>Gana " . $this->jugadores[1]->getNombre() . "!</strong></p>";
        } else {
            echo "<p><strong>Empate</strong></p>";
        }

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
