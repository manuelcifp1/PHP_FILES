<?php

//Clase Seguridad - maneja las verificaciones y controles de sesión.
class Seguridad {

    //Método que inicia sesión solo si aún no está iniciada.
    public static function iniciarSesion() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    /* Verifica si la sesión es válida:
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
            /* Si no existe sesión, redirige a login.
               Usamos dirname() para construir la ruta de forma dinámica,
               calculando siempre el directorio actual y evitando rutas fijas.
               Aquí solo bajamos un nivel porque normalmente se llama desde index.php.*/
            $base = dirname($_SERVER['PHP_SELF']);
            header("Location: $base/auth/login.php");
            exit;
        }
    }

    // Destruye completamente la sesión y redirige al login.
    public static function cerrarSesion() {
        session_unset();
        session_destroy();

        /*Como este método se llama desde auth/logout.php,
        necesitamos subir un nivel usando dirname(dirname()),
        para volver a la raíz del proyecto y entrar correctamente
        en auth/login.php.*/
        $base = dirname(dirname($_SERVER['PHP_SELF']));
        header("Location: $base/auth/login.php");
        exit;
    }
}
?>
