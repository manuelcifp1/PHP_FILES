<?php

class Usuario
{
    private $conn;
    private $table = 'usuarios';

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function read()
    {
        $query = "SELECT * FROM {$this->table}";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($nombre, $password, $rol)
    {
        $query = "INSERT INTO {$this->table} (nombre, password, rol) VALUES (:nombre, :password, :rol)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':rol', $rol);
        return $stmt->execute();
    }

    public function update($idusuario, $nombre, $password, $rol)
    {
        $query = "UPDATE {$this->table} SET nombre = :nombre, password = :password, rol = :rol WHERE idusuario = :idusuario";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':idusuario', $idusuario);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':rol', $rol);
        return $stmt->execute();
    }

    public function delete($idusuario)
    {
        $query = "DELETE FROM {$this->table} WHERE idusuario = :idusuario";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':idusuario', $idusuario);
        return $stmt->execute();
    }
}
