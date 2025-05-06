<?php
/*6. Crea un trait llamado Identificador que contenga un atributo protegido llamado $id
 y un método público establecerId($id) para asignar un valor a este atributo.
        - Crea una clase Producto que use este trait y añada un método para mostrar el ID del producto. */

trait Identificador {
        protected $id;

        public function establecerId($id) {
               $this->id = $id;
        }
}
class Producto {
        use Identificador;        
        public function mostrarId() {
              echo "El ID del producto es: " . $this->id;   
        }
}

$producto = new Producto();
$producto->establecerId(101);
$producto->mostrarId(); // Muestra: El ID del producto es: 101


?>