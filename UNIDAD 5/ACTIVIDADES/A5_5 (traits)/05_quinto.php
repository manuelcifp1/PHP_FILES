<?php
/*5. Crea dos traits:
        - Registro con un método guardar($datos) que imprima "Guardando datos: ..."
         y muestre los datos.
        - Notificación con un método enviar($mensaje) que imprima "Enviando mensaje: ..."
         y muestre el mensaje.
        - Crea una clase Tarea que use ambos traits y permita guardar una tarea y enviar
         una notificación cuando una tarea se complete. */

trait Registro {
        public function guardar($datos) {
                echo "Guardando datos: " . $datos . "<br>";
        }
}

trait Notificacion {
        public function enviar($mensaje) {
                echo "Enviando mensaje: " . $mensaje . "<br>";
        }
}

class Tarea {
        use Registro, Notificacion;

        public function completarTarea($descripcion) {
                // Guardamos la tarea usando el método del trait
                $this->guardar($descripcion);
                // Enviamos una notificación
                $this->enviar("Tarea completada: " . $descripcion);
        }
}

$tarea = new Tarea();
$tarea->completarTarea("Actualizar el informe");
// Muestra:
// Guardando datos: Actualizar el informe
// Enviando mensaje: Tarea completada: Actualizar el informe
                  


?>