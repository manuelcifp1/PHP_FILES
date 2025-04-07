<?php
/**
 * Clase Database: Encapsula la conexión MySQLi con manejo de errores.
 */
class Database {
    private $host = 'localhost';
    private $usuario = 'root';
    private $clave = 'tu_clave';  // Cambia esta contraseña por la tuya
    private $nombreBD = 'login_db';
    private $conexion;

    public function __construct() {
        // Crear conexión usando MySQLi (POO)
        $this->conexion = new mysqli(
            $this->host,
            $this->usuario,
            $this->clave,
            $this->nombreBD
        );

        // Si hay error de conexión, mostrar mensaje y detener ejecución
        if ($this->conexion->connect_error) {
            // Aquí podrías registrar el error en logs si es producción
            die('❌ Error de conexión a la base de datos: ' . $this->conexion->connect_error);
        }

        // Opcional: configurar el charset a utf8mb4
        $this->conexion->set_charset("utf8mb4");
    }

    /**
     * Devuelve la conexión activa para usar en otras clases.
     */
    public function getConnection() {
        return $this->conexion;
    }
}
