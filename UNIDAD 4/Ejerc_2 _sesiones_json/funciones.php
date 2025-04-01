<?php
//Función para validar username con expresión regular.
function validarUsername($username) {
    $regExusername = "/^[A-Za-zÁÉÍÓÚáéíóúÑñÜü'´ ]+$/";
    if (!preg_match($regExusername, $username)) {
        echo "<p>Usuario no válido.</p>";
    }
}

//Función para validar contraseña con expresión regular.
function validarPassword($password) {
    $regExPassword = "/[0-9]{4}/";
    if (!preg_match($regExPassword, $password)) {
        echo "<p>Contraseña no válida.</p>";
    }
}

//Función para obtener todos los usernames del JSON.
function obtenerUsernames() {
    $ruta = __DIR__ . "/Usuarios/usuarios.json";
    if (!file_exists($ruta)) {
        return [];
    }
    $json = file_get_contents($ruta);
    return json_decode($json, true);
}

//Función para guardar un nuevo username en el JSON.
function guardarUsername($nuevoUsername) {
    $usernames = obtenerUsernames();
    $usernames[] = $nuevoUsername;
    file_put_contents(__DIR__ . "/Usuarios/usuarios.json", json_encode($usernames, JSON_PRETTY_PRINT));
}

//Función para buscar username por nombre.
function buscarUsername($username) {
    $usernames = obtenerUsernames();
    foreach ($usernames as $user) {
        if ($user['username'] === $username) {
            return $user;
        }
    }
    return null;
}



?>