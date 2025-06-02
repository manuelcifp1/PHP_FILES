<?php
require_once 'EmptyModel.php';

class Contactos extends EmptyModel {
    public function __construct() {
        parent::__construct('contactos', 'id');
    }

    // Leer contactos solo del usuario específico
    public function leerPaginadoPorUsuario($user_id, $limite, $offset) {
        $sql = "SELECT * FROM {$this->tabla} WHERE user_id = :user_id LIMIT :limite OFFSET :offset";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->bindValue(':limite', (int)$limite, PDO::PARAM_INT);
        $stmt->bindValue(':offset', (int)$offset, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function contarRegistrosPorUsuario($user_id) {
        $sql = "SELECT COUNT(*) as total FROM {$this->tabla} WHERE user_id = :user_id";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total'];
    }

    public function leerPorUsuario($id, $user_id) {
        $sql = "SELECT * FROM {$this->tabla} WHERE id = :id AND user_id = :user_id";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>

