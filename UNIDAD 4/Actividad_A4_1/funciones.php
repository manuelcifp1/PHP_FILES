<?php
//Función para validar username con expresión regular.
function validarUsername($username) {
    $regExusername = "/^[A-Za-zÁÉÍÓÚáéíóúÑñÜü'´ ]+$/";
    if (!preg_match($regExusername, $username)) {
        echo "<p style= 'color: red;'>Usuario no válido.</p>";
    }
}

//Función para validar contraseña con expresión regular.
function validarPassword($password) {
    $regExPassword = "/[0-9]{4}/";
    if (!preg_match($regExPassword, $password)) {
        echo "<p style= 'color: red;'>Contraseña no válida.</p>";
    }
}

function validarEmail($email) {
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<p style= 'color: red;'>Email no válido</p>";
    }
} 

//Función para buscar username por nombre. Recorre el array de obtenerUsernames y busca al nuevo usuario.
function buscarUsername($username) {
    $usernames = obtenerUsernames();
    foreach ($usernames as $user) {
        if ($user['username'] === $username) {
            return $user;
        }
    }
    return null;
}

//Función para obtener todos los usernames del JSON. Crea un array asociativo con el contenido del json.
function obtenerUsernames() {
    $ruta = __DIR__ . "/Usuarios/usuarios.json";
    if (!file_exists($ruta)) {
        return [];//Si el archivo json no existe, devuelve un array vacío para llenarlo de datos y convertirlo a json.
    }
    $json = file_get_contents($ruta);
    return json_decode($json, true);
}

//Función para guardar un nuevo username en el JSON. Guarda al nuevo usuario en el array anterior y luego pasa el array a json.
function guardarUsername($nuevoUsername) {
    $usernames = obtenerUsernames();
    $usernames[] = $nuevoUsername;
    file_put_contents(__DIR__ . "/Usuarios/usuarios.json", json_encode($usernames, JSON_PRETTY_PRINT));
}

?>