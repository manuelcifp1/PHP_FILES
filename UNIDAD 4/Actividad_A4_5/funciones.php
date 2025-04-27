<?php

function validarNombre($nombre) {
    $regExpNombre = "/^[a-zA-ZáéíóúÁÉÍÓÚñÑüÜ´' ]+$/";
    if(!preg_match($regExpNombre, $nombre)) {
        echo "<p>El nombre no es correcto</p>";
    }
}

function validarPassword($password) {
    $regExpPassword = "/[0-9]{4}/";
    if(!preg_match($regExpPassword, $password)) {
        echo "<p>La contraseña no es correcta.</p>";
    }
}

function validarEmail($email) {
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<p>El email no es correcto</p>";
    }
}

function conectarBD() {
    $host = 'localhost';
    $usuario = 'root';
    $password = '';
    $baseDeDatos = 'tienda';

    try {
        $conn = new mysqli($host, $usuario, $password, $baseDeDatos);

        if($conn->connect_error) {
            throw new Exception('Error al conectar a la BD' . $conn->connect_error);
        }
        return $conn;

    } catch(Exception $e) {
        die('Error de conexión' . $e->getMessage());
    }
}