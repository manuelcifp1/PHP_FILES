<?php
/*La clase Jugador, que sólo tiene la propiedad color, con su construct
y un getter. */
class Jugador {
    public string $color;

    public function __construct(string $color) {
        $this->color = $color;
    }

    public function getColor(): string {
        return $this->color;
    }
}

?>