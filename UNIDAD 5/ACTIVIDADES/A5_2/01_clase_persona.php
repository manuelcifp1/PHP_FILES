<?php 
/*● Crea la clase persona.

  ● Agrega validación adicional para que el usuario sólo pueda agregar nicknames que
    tengan al menos 2 caracteres y no sean igual a su nombre o apellido.

  ● Agrega la propiedad «fecha de nacimiento» a la clase persona, y que esta propiedad
    pueda pasarse a través del constructor. Luego crea un método para obtener la edad
    del usuario (getAge), por supuesto la edad la vas a calcular a partir de la fecha de
    nacimiento. */

class Persona {
    public $nombre;
    public $apellido;
    public $edad;
    public $fechaNacimiento;

    public $nickname;

    public function __construct($nombre, $apellido, $nickname, $fechaNacimiento) {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        //Ahora establecemos la edad usando el setter de la edad que lo calcula con $fechaNacimiento.
        $this->edad = $this->setEdad($fechaNacimiento);
        //Y validamos el nickname usando setter setNickname.
        $this->setNickname($nickname);
        $this->fechaNacimiento = $fechaNacimiento; 
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setApellido($apellido) {
        $this->apellido = $apellido;
    }

    public function getApellido() {
        return $this->apellido;
    }

    public function setEdad($fechaNacimiento) {
        /*Creamos un objeto de la clase DateTime(), asignándole como parámetro la fecha de nacimiento.
        DateTime() convierte una string con una fecha en un objeto DateTime con el que podemos operar a nivel fecha.*/
        $fechaNacimiento = new DateTime($fechaNacimiento);
        /*Creamos otro objeto de la clase DateTime() con la fecha de hoy.
         El constructor de esta clase tiene como parámetro por defecto la fecha actual,
         por eso no le pasamos parámetro.*/
        $hoy = new DateTime();
        /*Creamos una variable con la diferencia entre las dos fechas, usando para restar el método
        diff() que pertenece a la clase DateTime(). Este método nos devuelve un objeto de otra clase,
        llamada DateInterval(), cuyas propiedades son: y, m, d, etc.. Por eso en el return ponemos $diferencia->y,
        por que estamos devolviendo el valor de la propiedad y(años), así nos dará la edad en años del usuario.*/ 
        $diferencia = $hoy->diff($fechaNacimiento);
        return $diferencia->y;
    }

    public function getEdad() {
        return $this->setEdad($this->fechaNacimiento);
    }

    public function setNickname($nickname) {
        if((preg_match("/^.{2,}$/", $nickname)) && $this->nombre != $nickname && $this->apellido != $nickname) {
            $this->nickname = $nickname;
        } else {
            echo "Atención " .$this->nombre . ": El nickname debe tener más de 2 caracteres y ser diferente del nombre y del apellido.<br>";
        }
    }

    public function getNickname() {
        return $this->nickname;
    }

    public function setfechaNacimiento($fechaNacimiento) {
        $this->fechaNacimiento = $fechaNacimiento;
        
    }

    public function getfechaNacimiento() {
        return $this->fechaNacimiento;
    }



    public function saludar() {
        echo "Hola, me llamo " . $this->nombre . " " . $this->apellido . " y tengo " . $this->edad . " años. Mi nickname es " . $this->nickname . ".<br>";
    }
}



?>