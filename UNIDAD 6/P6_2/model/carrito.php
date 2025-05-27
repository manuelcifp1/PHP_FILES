<?php

/**
 * Clase Carrito - maneja operaciones CRUD sobre la tabla 'carrito'.
 */
class Carrito {
    private $conn;
    private $table = 'carrito';

    public function __construct() {
        // Usa la conexión singleton
        $this->conn = Conexion::getInstance();
    }

    /**
     * Obtiene todos los productos del carrito del usuario.
     * Incluye el nombre del producto usando JOIN.
     */
    public function read($idusuario) {
        try {
            $query = "
                SELECT c.idcarrito, c.idinventario, p.nombre AS nombre_producto, c.unidades
                FROM {$this->table} c
                JOIN productos p ON c.idinventario = p.idinventario
                WHERE c.idusuario = :idusuario
            ";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':idusuario', $idusuario);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error al leer carrito: " . $e->getMessage();
            return [];
        }
    }

    /**
     * Añade o suma unidades a un producto del carrito.
     */
    public function addOrUpdate($idusuario, $idinventario, $unidades) {
        try {
            // Verificar si ya existe el producto en el carrito
            $query = "SELECT idcarrito, unidades FROM {$this->table} WHERE idusuario = :idusuario AND idinventario = :idinventario";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':idusuario', $idusuario);
            $stmt->bindParam(':idinventario', $idinventario);
            $stmt->execute();
            $item = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($item) {
                // Ya existe: actualizar sumando unidades
                $nuevasUnidades = $item['unidades'] + $unidades;
                $updateQuery = "UPDATE {$this->table} SET unidades = :unidades WHERE idcarrito = :idcarrito";
                $updateStmt = $this->conn->prepare($updateQuery);
                $updateStmt->bindParam(':unidades', $nuevasUnidades);
                $updateStmt->bindParam(':idcarrito', $item['idcarrito']);
                return $updateStmt->execute();
            } else {
                // No existe: insertar nuevo
                $insertQuery = "INSERT INTO {$this->table} (idusuario, idinventario, unidades) VALUES (:idusuario, :idinventario, :unidades)";
                $insertStmt = $this->conn->prepare($insertQuery);
                $insertStmt->bindParam(':idusuario', $idusuario);
                $insertStmt->bindParam(':idinventario', $idinventario);
                $insertStmt->bindParam(':unidades', $unidades);
                return $insertStmt->execute();
            }
        } catch (PDOException $e) {
            echo "Error en addOrUpdate carrito: " . $e->getMessage();
            return false;
        }
    }

    /**
     * Actualiza las unidades de un producto del carrito.
     */
    public function update($idcarrito, $unidades) {
        try {
            $query = "UPDATE {$this->table} SET unidades = :unidades WHERE idcarrito = :idcarrito";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':unidades', $unidades);
            $stmt->bindParam(':idcarrito', $idcarrito);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Error al actualizar carrito: " . $e->getMessage();
            return false;
        }
    }

    /**
     * Elimina un producto del carrito.
     */
    public function delete($idcarrito) {
        try {
            $query = "DELETE FROM {$this->table} WHERE idcarrito = :idcarrito";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':idcarrito', $idcarrito);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Error al eliminar del carrito: " . $e->getMessage();
            return false;
        }
    }
}
?>
