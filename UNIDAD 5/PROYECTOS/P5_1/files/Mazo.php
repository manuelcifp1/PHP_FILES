<?php
//Requerimos la presencia de Carta ya que se usa en este script.
require_once "Carta.php";

//Clase Mazo: contiene todas las cartas del juego
class Mazo {
    private array $cartas = [];

    //Constructor: genera las 28 cartas (valores 1 al 7 en 4 palos)
    public function __construct() {
        $palos = ["Espadas", "Copas", "Oros", "Bastos"];
        $valores = [1, 2, 3, 4, 5, 6, 7];
        /*Un doble foreach para generarlas, primero iteración sobre el palo y en cada una,
         otra iteración sobre el valor y se usa el constructor de la clase Carta para ir
        instanciando cada objeto/carta.*/
        foreach ($palos as $palo) {
            foreach ($valores as $valor) {
                $this->cartas[] = new Carta((string)$valor, $palo);
            }
        }
    }

    //Mezcla el mazo aleatoriamente usando shuffle().
    public function barajar(): void {
        shuffle($this->cartas);
    }

    //Reparte una carta aleatoria del mazo, sin eliminarla aún.
    //Este método debe devolver un objeto de Carta o null (?Carta).
    public function repartir(): ?Carta {
        //Si el mazo está vacío, devuelve null.
        if (empty($this->cartas)) {
            return null;
        }
        //Seleccionamos una carta aleatoria del array para devolver.
        $indice = array_rand($this->cartas);
        return $this->cartas[$indice];
    }

    /*Elimina una carta específica del mazo tras repartirla. A este método hay que 
    pasarle un objeto de la clase Carta (Carta $carta) y el tipo de valor de devolución
    es void porque no devuelve nada, sólo realiza una acción. */
    public function quitar_carta(Carta $carta): void {
        /*Recorremos cartas y, usando el método es_igual(), comprobamos si alguna
        carta es igual a la carta pasada como parámetro (que sería la carta repartida).
        Si esto ocurre, la quitamos del mazo. */
        foreach ($this->cartas as $i => $c) {
            if ($c->es_igual($carta)) {
                unset($this->cartas[$i]);
                /*Ahora, usando array_values, reindexamos el array por la pérdida
                 del índice provocada por unset(), que elimina elemento e índice.*/
                $this->cartas = array_values($this->cartas);
                break;
            }
        }
    }
}
