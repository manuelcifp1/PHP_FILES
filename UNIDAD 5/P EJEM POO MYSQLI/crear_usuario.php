<?php
require_once 'classes/Database.php';

/**
 * Clase para insertar usuarios nuevos en la base de datos
 */
class UserSeeder {
    private $db;

    public function __construct(Database $database) {
        $this->db = $database->getConnection();
    }

    public function crearUsuario($usuario, $clave) {
        // Validación básica
        if (empty($usuario) || empty($clave)) {
            echo "Error: Debes ingresar usuario y contraseña.";
            return;
        }

        // Hashear contraseña antes de guardarla
        $hash = password_hash($clave, PASSWORD_DEFAULT);

        // Preparar inserción segura
        $stmt = $this->db->prepare("INSERT INTO usuarios (usuario, clave) VALUES (?, ?)");
        if (!$stmt) {
            echo "Error al preparar la consulta: " . $this->db->error;
            return;
        }

        $stmt->bind_param("ss", $usuario, $hash);

        if ($stmt->execute()) {
            echo "✅ Usuario '$usuario' creado correctamente.";
        } else {
            echo "❌ Error: " . $stmt->error;
        }
    }
}

// Crear un usuario de ejemplo
$database = new Database();
$seeder = new UserSeeder($database);
$seeder->crearUsuario('admin', '1234'); // Puedes cambiar los valores
