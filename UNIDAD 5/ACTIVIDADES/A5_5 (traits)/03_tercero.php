<?php
/*3. Define un trait llamado Saludable con un método protegido saludo() que retorne "¡Hola desde el trait!".
         Luego, crea:
        - Una clase base llamada Persona con un método público introducir() que retorne "Soy una persona".
        - Una clase hija llamada Estudiante que use el trait Saludable y sobrescriba el método introducir()
         para incluir el saludo del trait junto con su propio mensaje: "Soy un estudiante".
        - Finalmente, instancia la clase Estudiante y llama a sus métodos. */

trait Saludable {
      protected function saludo() {
        return "¡Hola desde el trait!";
      }
}

class Persona {
        public function introducir() {
                return "Soy una persona";
        }
}

class Estudiante extends Persona {
        public $nombre;
        function __construct($nombre) {
                $this->nombre = $nombre;
        }

        use Saludable;
        public function introducir() {
             return $this->saludo() . " Soy un estudiante";
        }
}

$estudiante01 = new Estudiante("Pepe");

echo $estudiante01->introducir();


?>