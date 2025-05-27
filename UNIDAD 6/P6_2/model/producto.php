<?php

/**
 * Clase Producto - maneja operaciones CRUD sobre la tabla 'productos'.
 */
class Producto {
    private $conn;
    private $table = 'productos';

    public function __construct() {
        // Usa la conexión singleton
        $this->conn = Conexion::getInstance();
    }

    /**
     * Obtiene todos los productos.
     */
    public function read() {
        try {
            $query = "SELECT * FROM {$this->table}";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error al leer productos: " . $e->getMessage();
            return [];
        }
    }

    /**
     * Crea un nuevo producto.
     */
    public function create($nombre, $descripcion, $stock) {
        try {
            $query = "INSERT INTO {$this->table} (nombre, descripcion, stock) VALUES (:nombre, :descripcion, :stock)";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':descripcion', $descripcion);
            $stmt->bindParam(':stock', $stock);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Error al crear producto: " . $e->getMessage();
            return false;
        }
    }

    /**
     * Actualiza un producto existente.
     */
    public function update($idinventario, $nombre, $descripcion, $stock) {
        try {
            $query = "UPDATE {$this->table} SET nombre = :nombre, descripcion = :descripcion, stock = :stock WHERE idinventario = :idinventario";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':idinventario', $idinventario);
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':descripcion', $descripcion);
            $stmt->bindParam(':stock', $stock);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Error al actualizar producto: " . $e->getMessage();
            return false;
        }
    }

    /**
     * Elimina un producto.
     */
    public function delete($idinventario) {
        try {
            $query = "DELETE FROM {$this->table} WHERE idinventario = :idinventario";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':idinventario', $idinventario);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Error al eliminar producto: " . $e->getMessage();
            return false;
        }
    }
}
?>
