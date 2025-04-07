<?php
require_once 'classes/Database.php';

/**
 * Clase Auth: Maneja autenticación con validación de entrada.
 */
class Auth {
    private $db;

    public function __construct(Database $database) {
        // Obtener conexión desde Database
        $this->db = $database->getConnection();
    }

    /**
     * Intenta iniciar sesión validando los datos del formulario y la contraseña.
     */
    public function login($usuario, $clave) {
        // --- VALIDACIONES BÁSICAS DE ENTRADA ---

        // Verifica que no estén vacíos
        if (empty($usuario) || empty($clave)) {
            return "Debes completar ambos campos.";
        }

        // Limita longitud mínima y máxima
        if (strlen($usuario) < 3 || strlen($usuario) > 50) {
            return "El usuario debe tener entre 3 y 50 caracteres.";
        }

        // Puedes añadir validaciones con expresiones regulares aquí si quieres

        // --- CONSULTA PREPARADA SEGURA ---

        // Prepara la consulta SQL para evitar inyecciones
        $stmt = $this->db->prepare("SELECT clave FROM usuarios WHERE usuario = ?");
        if (!$stmt) {
            return "Error al preparar la consulta: " . $this->db->error;
        }

        // Vincula el parámetro ($usuario) con tipo "s" (string)
        $stmt->bind_param("s", $usuario);
        $stmt->execute();
        $stmt->bind_result($clave_hash);

        // Si se encuentra el usuario y la clave es correcta
        if ($stmt->fetch() && password_verify($clave, $clave_hash)) {
            $_SESSION['autenticado'] = true;
            $_SESSION['usuario'] = $usuario;
            return true;
        }

        return "Usuario o contraseña incorrectos.";
    }
}
