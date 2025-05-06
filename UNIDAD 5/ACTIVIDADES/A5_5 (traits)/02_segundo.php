<?php
/* 2. Crea dos traits, TraitA y TraitB, ambos con un método público llamado mensaje().
        - En TraitA, haz que el método devuelva "Mensaje desde TraitA".
        - En TraitB, haz que el método devuelva "Mensaje desde TraitB".
        - Luego, crea una clase MiClase que utilice ambos traits y resuelve el conflicto utilizando el operador insteadof.
         Adicionalmente, alias el método de TraitA con un nuevo nombre mensajeTraitA para que también pueda ser accesible. */

trait TraitA {
        public function mensaje() {
                return "Mensaje desde TraitA";
        }
}

trait TraitB {
        public function mensaje() {
                return "Mensaje desde TraitB";
        }
}

class MiClase {
        use TraitA, TraitB {
                TraitB::mensaje insteadof TraitA;//Usa TraitB en lugar de TraitA.
                TraitA::mensaje as mensajeTraitA;//Pero TraitA sigue disponible con otro nombre.
            }
}


?>