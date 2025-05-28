<?php

/**
 * Clase Usuario - maneja las operaciones sobre la tabla 'usuarios'.
 */
require_once "conexion.php";
class Usuario {
    private $conn;
    private $table = 'usuarios';

    public function __construct() {
        // Usa la conexión singleton
        $this->conn = Conexion::getInstance();
    }

    /**
     * Crea un nuevo usuario en la base de datos.
     * Siempre se guarda como 'cliente' por defecto a menos que se indique otro rol.
     */
    public function create($nombre, $password, $rol = 'cliente') {
        try {
            // Hashear el password antes de guardar por seguridad
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            $query = "INSERT INTO {$this->table} (nombre, password, rol) VALUES (:nombre, :password, :rol)";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':password', $hashedPassword);
            $stmt->bindParam(':rol', $rol);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Error al crear usuario: " . $e->getMessage();
            return false;
        }
    }
}
?>
