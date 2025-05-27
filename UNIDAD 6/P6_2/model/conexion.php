<?php

class Conexion {
    private static $host = 'localhost';
    private static $dbname = 'tiendat62';
    private static $username = 'root';
    private static $password = '';
    private static $instance = null;

    private function __construct() {
        //constructor privado para evitar que alguien cree una instancia directamente.
    }

    //El método getInstance() devuelve siempre la misma conexión.
    public static function getInstance() {
        if (self::$instance === null) {
            try {
                self::$instance = new PDO(
                    "mysql:host=" . self::$host . ";dbname=" . self::$dbname,
                    self::$username,
                    self::$password
                );
                self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo "Error de conexión: " . $e->getMessage();
            }
        }
        return self::$instance;
    }
}
?>
