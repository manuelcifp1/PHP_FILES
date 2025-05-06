<?php
    /**********************************/
    /************* Traits ************/
    /********************************/
    trait Juego2 {
        function play(){
            echo "Jugando a un juego";
        }
    }
    trait Musica {
        function play(){
            echo "Escuchando música";
        }
    }
    /**********************************/
    /************** Clases ***********/
    /********************************/
    class Reproductor {
        use Juego2, Musica {
            Juego2::play as playDeJuego;
            Musica::play insteadof Juego;
        }
    }
    /**********************************/
    /********** Principal ************/
    /********************************/
    $reproductor = new Reproductor;
    $reproductor->play(); // Devuelve: Escuchando música
?>