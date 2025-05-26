<?php

class Producto
{
    private $conn;
    private $table = 'productos';

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

    public function create($nombre, $descripcion, $stock)
    {
        $query = "INSERT INTO {$this->table} (nombre, descripcion, stock) VALUES (:nombre, :descripcion, :stock)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':descripcion', $descripcion);
        $stmt->bindParam(':stock', $stock);
        return $stmt->execute();
    }

    public function update($idinventario, $nombre, $descripcion, $stock)
    {
        $query = "UPDATE {$this->table} SET nombre = :nombre, descripcion = :descripcion, stock = :stock WHERE idinventario = :idinventario";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':idinventario', $idinventario);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':descripcion', $descripcion);
        $stmt->bindParam(':stock', $stock);
        return $stmt->execute();
    }

    public function delete($idinventario)
    {
        $query = "DELETE FROM {$this->table} WHERE idinventario = :idinventario";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':idinventario', $idinventario);
        return $stmt->execute();
    }
}
