<?php
/*7. Crea un trait TraitPrivado que contenga:
        - Un método privado calculoInterno() que retorne "Cálculo interno".
        - Un método público calcular() que use calculoInterno() para retornar
         "Resultado: Cálculo interno".
        - Usa el trait en una clase Calculadora. Luego, intenta sobrescribir
         el método privado desde la clase y observa el resultado. */

trait TraitPrivado {
        protected function calculoInterno() {
                return "Cálculo interno";
        }

        public function calcular() { 
               $resultado = $this->calculoInterno();                
               return "Resultado: " . $resultado;
        }
}

class Calculadora {
        use TraitPrivado;
        function calculoInterno() {
                return "Patata";   
        }
}
$calc = new Calculadora();
echo $calc->calcular(); // Resultado: Patata

?>