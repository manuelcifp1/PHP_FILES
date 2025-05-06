<?php

class ConexionBD {
    private static $instancia = null;
    private $conexion;

    // Constructor privado: nadie puede hacer new desde fuera
    private function __construct() {
        try {
            $this->conexion = new PDO("mysql:host=localhost;dbname=mi_base", "usuario", "contraseña");
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Error de conexión: " . $e->getMessage());
        }
    }

    // Método público para obtener la única instancia
    public static function getInstance() {
        if (self::$instancia === null) {
            self::$instancia = new ConexionBD();
        }
        return self::$instancia;
    }

    // Método para obtener el objeto PDO
    public function getConexion() {
        return $this->conexion;
    }
}
