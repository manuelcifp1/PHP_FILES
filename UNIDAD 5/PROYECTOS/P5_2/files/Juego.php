<?php
/*En la clase juego, preparamos el mismo. Sus propiedades son las piezas y el tablero,
que instanciamos a través de su construct.  */
class Juego {
    private Tablero $tablero;
    private array $torres;
    private array $caballos;
    private array $alfiles;
    private array $reinas;
    private array $reyes;
    private array $peones;

    //Nuevas propiedades añadidas para controlar los jugadores y el turno actual
    private Jugador $jugadorBlanco;
    private Jugador $jugadorNegro;
    private Jugador $jugadorEnTurno;

    public function __construct() {
        $this->tablero = new Tablero();/*Poner los paréntesis después del nombre de la clase Tablero
         es una buena práctica, que hace que ejecutemos el constructor de Tablero.
         Funcionaría igual sin los paréntesis, pero es más correcto.*/

        //Creamos los jugadores blanco y negro
        $this->jugadorBlanco = new Jugador("blanco");
        $this->jugadorNegro = new Jugador("negro");
        $this->jugadorEnTurno = $this->jugadorBlanco; //Siempre comienza el jugador blanco

        //Aquí instanciamos las piezas usando sus métodos estáticos. 
        $this->torres = Torre::crearTorresIniciales();
        $this->caballos = Caballo::crearCaballosIniciales();
        $this->alfiles = Alfil::crearAlfilesIniciales();
        $this->reinas = Reina::crearReinasIniciales();
        $this->reyes = Rey::crearReyesIniciales();
        $this->peones = Peon::crearPeonesIniciales();

        //Y ahora colocamos las piezas en sus posiciones iniciales, usando el getter de posición que está en Pieza.
        foreach ($this->torres as $torre) {
            $this->tablero->colocarPieza($torre, $torre->getPosicion());
        }

        foreach ($this->caballos as $caballo) {
            $this->tablero->colocarPieza($caballo, $caballo->getPosicion());
        }

        foreach ($this->alfiles as $alfil) {
            $this->tablero->colocarPieza($alfil, $alfil->getPosicion());
        }

        foreach ($this->reinas as $reina) {
            $this->tablero->colocarPieza($reina, $reina->getPosicion());
        }

        foreach ($this->reyes as $rey) {
            $this->tablero->colocarPieza($rey, $rey->getPosicion());
        }

        foreach ($this->peones as $peon) {
            $this->tablero->colocarPieza($peon, $peon->getPosicion());
        }
    }

    //Un getter de la propiedad tablero para usarlo más adelante.
    public function getTablero() {
        return $this->tablero;
    }

    //Devuelve el jugador al que le toca jugar (método tipado para que devuelva un objeto de Jugador).
    public function getJugadorEnTurno(): Jugador {
        return $this->jugadorEnTurno;
    }

    //Cambia al siguiente jugador alternando con un operador ternario (blanco <-> negro)
    public function cambiarTurno(): void {
        $this->jugadorEnTurno = ($this->jugadorEnTurno === $this->jugadorBlanco) ? $this->jugadorNegro : $this->jugadorBlanco;
    }

    //Este método realiza un movimiento de una pieza desde $origen a $destino, si pertenece al jugador en turno.
    public function jugarMovimiento(string $origen, string $destino): void {
        $pieza = $this->tablero->obtenerPieza($origen);

        if ($pieza === null) {
            echo "<p>No hay ninguna pieza en $origen.</p>";
            return;
        }

        //Verificamos que la pieza sea del color del jugador actual.
        if ($pieza->getColor() !== $this->jugadorEnTurno->getColor()) {
            echo "<p>No puedes mover una pieza del otro jugador.</p>";
            return;
        }

        //Movemos la pieza internamente y actualizamos su posición en el tablero.
        $pieza->mover($destino);
        $this->tablero->colocarPieza($pieza, $destino);

        //Eliminamos la pieza de su posición original y creamos una instancia de CasillaVacia.
        $this->tablero->colocarPieza(new CasillaVacia("vacio", $origen), $origen);

        echo "<p>El jugador " . $this->jugadorEnTurno->getColor() . " ha movido una pieza de $origen a $destino.</p>";

        //Cambiamos el turno al finalizar el movimiento.
        $this->cambiarTurno();
    }
}
?>
