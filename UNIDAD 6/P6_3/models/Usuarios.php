<?php
require_once 'EmptyModel.php';

class Usuarios extends EmptyModel {
    public function __construct() {
        parent::__construct('usuarios', 'id');
    }

    // Busca usuario por username
    public function buscarPorUsername($username) {
        $sql = "SELECT * FROM {$this->tabla} WHERE username = :username";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bindValue(':username', $username);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
