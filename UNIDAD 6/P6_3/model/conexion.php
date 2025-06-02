<?php

/*Clase Conexion - implementa patrón Singleton para mantener
 una única conexión PDO a la base de datos.*/
class Conexion {
    private static $host = 'localhost';
    private static $dbname = 'tiendat62';
    private static $username = 'root';
    private static $password = '';
    private static $instance = null;

    //Constructor privado para evitar instanciación directa
    private function __construct() {}

    //Método estático que devuelve siempre la misma instancia PDO (singleton).     
    public static function getInstance() {
        //Si no hay conexión (null) la instancia.
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
        //Si la hay, devuelve la que existe.
        return self::$instance;
    }
}
?>
