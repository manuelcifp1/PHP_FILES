<?php
    /**********************************/
    /************* Traits ************/
    /********************************/
    trait Juego {
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
        use Juego, Musica {
            Juego::play as playDeJuego;
            Musica::play insteadof Juego;
        }
    }
    /**********************************/
    /********** Principal ************/
    /********************************/
    $reproductor = new Reproductor;
    $reproductor->play(); // Devuelve: Escuchando música
?>