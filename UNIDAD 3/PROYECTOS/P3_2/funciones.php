
<?php
//archivo funciones.php

$errores = [];//Array para almacenar errores.


            
function validarUsuario($usuario) {
    $regExUsuario = "/^[A-Za-zÁÉÍÓÚáéíóúÑñÜü'´ ]+$/";
    if (!preg_match($regExUsuario, $usuario)) {
        return $errores[] = "Usuario no válido.";
    }
}

function validarPassword($password) {
    $regExPassword = "/[0-9]{4}/";
    if (!preg_match($regExPassword, $password)) {
        return $errores[] = "Contraseña no válida.";
    }
}

?>