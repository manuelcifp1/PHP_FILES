<?php
//Archivo de seguridad para la sesión.

    if (isset($_SESSION['usuario'])) {
        //Validamos el agente del navegador para evitar secuestros de sesión
        if (!isset($_SESSION['user_agent']) || $_SESSION['user_agent'] !== $_SERVER['HTTP_USER_AGENT']) {
            session_unset();
            session_destroy();
            header("Location: ../auth/login.php");
            exit;
        }

        //Control de tiempo de inactividad
        $timeout = 600; // 10 minutos en segundos

        if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'] > $timeout)) {
            session_unset();
            session_destroy();
            header("Location: ../auth/login.php");
            exit;
        }

        //Actualizamos el tiempo de actividad
        $_SESSION['last_activity'] = time();
    }
?>



