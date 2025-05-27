<?php
class Carrito {
    private $conn;
    private $table = 'carrito';

    public function __construct() {
        $this->conn = Conexion::getInstance();
    }

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
    //Este método sirve para poder añadir unidades a un producto que ya está en el carrito.
    public function addOrUpdate($idusuario, $idinventario, $unidades) {
        try {
            //Verificar si ya existe
            $query = "SELECT idcarrito, unidades FROM {$this->table} WHERE idusuario = :idusuario AND idinventario = :idinventario";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':idusuario', $idusuario);
            $stmt->bindParam(':idinventario', $idinventario);
            $stmt->execute();
            $item = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($item) {
                //Ya existe: actualizar sumando unidades
                $nuevasUnidades = $item['unidades'] + $unidades;
                $updateQuery = "UPDATE {$this->table} SET unidades = :unidades WHERE idcarrito = :idcarrito";
                $updateStmt = $this->conn->prepare($updateQuery);
                $updateStmt->bindParam(':unidades', $nuevasUnidades);
                $updateStmt->bindParam(':idcarrito', $item['idcarrito']);
                return $updateStmt->execute();
            } else {
                //No existe: insertar nuevo
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
}

?>