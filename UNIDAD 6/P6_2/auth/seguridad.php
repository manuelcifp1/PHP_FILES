<?php

//Clase Seguridad - maneja las verificaciones y controles de sesión.
class Seguridad {

    //Método que nicia sesión solo si aún no está iniciada.     
    public static function iniciarSesion() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    /*Verifica si la sesión es válida:
     - Inicia sesión.   
     - Comprueba que el usuario esté logueado.
     - Valida el agente del navegador.
     - Controla tiempo de inactividad.
     Si algo falla, cierra la sesión.*/
    public static function verificarSesion() {
        self::iniciarSesion();

        if (isset($_SESSION['usuario'])) {
            //Validar agente navegador
            if (!isset($_SESSION['user_agent']) || $_SESSION['user_agent'] !== $_SERVER['HTTP_USER_AGENT']) {
                self::cerrarSesion();
            }

            //Control de tiempo de inactividad (10 min)
            $timeout = 600;
            if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'] > $timeout)) {
                self::cerrarSesion();
            }

            //Actualizar tiempo de actividad
            $_SESSION['last_activity'] = time();
        } else {
            //Si no existe sesión, te envía a login.php
            header("Location: /PHP_FILES/UNIDAD%206/P6_2/auth/login.php");

            exit;
        }
    }

    //Destruye completamente la sesión y redirige al login.    
    public static function cerrarSesion() {
        session_unset();
        session_destroy();
        header("Location: /PHP_FILES/UNIDAD%206/P6_2/auth/login.php");

        exit;
    }
}
?>
