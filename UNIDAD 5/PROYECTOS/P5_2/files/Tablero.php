<?php
class Tablero {
    //Un array que almacena las casillas del tablero, con su posición como clave y la pieza como valor.
    protected array $casillas = [];

    //Método para colocar una pieza en una posición específica del tablero al principio o durante el juego.
    public function colocarPieza(Pieza $pieza, string $posicion): void {
        //Se almacena la pieza en el array $casillas usando la posición como índice
        $this->casillas[$posicion] = $pieza;
    }

    /*Método para obtener la pieza que está en una posición concreta del tablero.
    Obsérvese el interrogante delante del tipado de retorno. Quiere decir que este método debe devolver
    un objeto de la clase Pieza (si hay una pieza en la casilla) o null (si no la hay).
    Si no añadimos el interrogante, nos daría un pedazo de error cuando no hubiera pieza en la casilla 
    que consultamos.*/
    public function obtenerPieza(string $posicion): ?Pieza {
        /*Si hay una pieza en esa posición, la devuelve; si no, devuelve null
         (usando el operador de fusión null, que nos viene al pelo para este caso concreto).*/
        return $this->casillas[$posicion] ?? null;
    }

    //Método para mostrar todas las piezas colocadas actualmente en el tablero.
    public function mostrarTablero(): void {
        //Se recorre el array de casillas. Cada clave ($pos) es una posición (ej. 'b2') y cada valor una pieza.
        foreach ($this->casillas as $pos => $pieza) {
            // Muestra la posición, el nombre de la clase de la pieza y su color
            echo "$pos: " . get_class($pieza) . " (" . $pieza->getColor() . ")<br>";
        }
    }
}



?>