<?php
    /**********************************/
    /************* Traits ************/
    /********************************/

    trait Mensaje {
        private $mensaje;

        public function alerta(){
            $this->definir();
            echo $this->mensaje;
        }
        abstract function definir();
    }
    
    /**********************************/
    /************** Clases ***********/
    /********************************/

    class Mensajero {
        use Mensaje;
        function definir(){
            $this->mensaje = "Esto es un mensaje";
        }
    }
    
    /**********************************/
    /********** Principal ************/
    /********************************/

    $mensajero = new Mensajero();
    $mensajero->alerta(); // Devuelve: Esto es un mensaje
?>