<?php

function validarNombre($nombre) {
    $regExNombre = "/^[A-Za-zÁÉÍÓÚáéíóúÑñÜü'´ ]+$/";
    if (!preg_match($regExNombre, $nombre)) {
        echo "<p>Nombre no válido.</p>";
    }
}

//Función para validar contraseña con expresión regular.
function validarPassword($password) {
    $regExPassword = "/[0-9]{4}/";
    if (!preg_match($regExPassword, $password)) {
        echo "<p>Contraseña no válida.</p>";
    }
}

?>