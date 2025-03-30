<?php
//Función para validar usuario con expresión regular.
function validarUsuario($usuario) {
    $regExUsuario = "/^[A-Za-zÁÉÍÓÚáéíóúÑñÜü'´ ]+$/";
    if (!preg_match($regExUsuario, $usuario)) {
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

//Función para obtener todos los usuarios del JSON.
function obtenerUsuarios() {
    $ruta = __DIR__ . "/Usuarios/usuarios.json";
    if (!file_exists($ruta)) {
        return [];
    }
    $json = file_get_contents($ruta);
    return json_decode($json, true);
}

//Función para guardar un nuevo usuario en el JSON.
function guardarUsuario($nuevoUsuario) {
    $usuarios = obtenerUsuarios();
    $usuarios[] = $nuevoUsuario;
    file_put_contents(__DIR__ . "/Usuarios/usuarios.json", json_encode($usuarios, JSON_PRETTY_PRINT));
}

//Función para buscar usuario por nombre.
function buscarUsuario($usuario) {
    $usuarios = obtenerUsuarios();
    foreach ($usuarios as $user) {
        if ($user['usuario'] === $usuario) {
            return $user;
        }
    }
    return null;
}



?>