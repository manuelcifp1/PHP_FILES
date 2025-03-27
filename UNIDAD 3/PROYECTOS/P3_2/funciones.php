<?php
//archivo funciones.php

$errores = [];//Array para almacenar errores.

//Función para validar usuario con expresión regular.
function validarUsuario($usuario) {
    global $errores;
    $regExUsuario = "/^[A-Za-zÁÉÍÓÚáéíóúÑñÜü'´ ]+$/";
    if (!preg_match($regExUsuario, $usuario)) {
        $errores[] = "Usuario no válido.";
    }
}

//Función para validar contraseña con expresión regular.
function validarPassword($password) {
    global $errores;
    $regExPassword = "/[0-9]{4}/";
    if (!preg_match($regExPassword, $password)) {
        $errores[] = "Contraseña no válida.";
    }
}

//Función para obtener todos los usuarios desde JSON.
function obtenerUsuarios() {
    $ruta = __DIR__ . "/user/usuarios.json";
    if (!file_exists($ruta)) {
        return [];
    }
    $json = file_get_contents($ruta);
    return json_decode($json, true);
}

//Función para guardar un nuevo usuario en JSON.
function guardarUsuario($nuevoUsuario) {
    $usuarios = obtenerUsuarios();
    $usuarios[] = $nuevoUsuario;
    file_put_contents(__DIR__ . "/user/usuarios.json", json_encode($usuarios, JSON_PRETTY_PRINT));
}

//Función para buscar usuario por nombre.
function buscarUsuario($nombre) {
    $usuarios = obtenerUsuarios();
    foreach ($usuarios as $user) {
        if ($user['usuario'] === $nombre) {
            return $user;
        }
    }
    return null;
}
?>
