<?php

//Función para conectar a la BD.
function conectarDB() {
    $host = 'localhost';
    $usuario = 'root';
    $password = '';
    $baseDeDatos = 'tienda';

    try {
        $conexion = new mysqli($host, $usuario, $password, $baseDeDatos);

        if ($conexion->connect_error) {
            throw new Exception('Error al conectar a la base de datos: ' . $conexion->connect_error);
        }

        return $conexion;
    } catch (Exception $e) {
        die('Error de conexión: ' . $e->getMessage());
    }
}
