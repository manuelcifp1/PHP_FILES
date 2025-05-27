<?php

class Usuario {
    private $conn;
    private $table = 'usuarios';

    //Así se conecta al estilo singleton
    public function __construct() {
        $this->conn = Conexion::getInstance();
    }

    public function create($nombre, $password, $rol = 'cliente') {
        try {
            //hashear el password antes de guardar
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