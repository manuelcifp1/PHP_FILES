<?php
    /**********************************/
    /************* Traits ************/
    /********************************/
    trait Comunicacion {
        function decirHola(){
            return "Hola";
        }
        function decirQueTal(){
            return "¿Qué tal? Soy un trait";
        }
        function decirHolaYQuetal(){
            return $this->decirHola() .  " " . $this->decirQueTal();
        }
        function preguntarEstado(){
            return $this->decirHola() . " " . parent::decirQueTal();
        }
        function decirBien(){
            return "Bien, desde el Trait Comunicación";
        }
    }
    /**********************************/
    /************** Clases ***********/
    /********************************/

    class Estado {
        function decirQueTal(){
            return "¿Qué tal? Soy Estado";
        }
        function decirBien(){
            return "Bien, desde la clase Estado";
        }
    }
    class Comunicar extends Estado {
        use Comunicacion;
        function decirQueTal() {
            return "¿Qué tal? Soy Comunicar";
        }
    }
    /**********************************/
    /********** Principal ************/
    /********************************/
    $a = new Comunicar;
    echo $a->decirHolaYQuetal() . "<br>"; // Devuelve: Hola ¿Qué tal? Soy comunicar
    echo $a->preguntarEstado() . "<br>"; // Devuelve: Hola ¿Qué tal? Soy Estado
    echo $a->decirBien(); // Devuelve: Bien, desde el Trait Comunicación
?>