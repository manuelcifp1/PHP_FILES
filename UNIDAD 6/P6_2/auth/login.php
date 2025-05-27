<?php
require_once 'seguridad.php';
Seguridad::iniciarSesion();
require_once '../model/conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $password = $_POST['password'];

    $db = Conexion::getInstance();
    $query = "SELECT * FROM usuarios WHERE nombre = :nombre";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':nombre', $nombre);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        // Guardamos información importante en la sesión
        $_SESSION['usuario'] = $nombre;
        $_SESSION['idusuario'] = $user['idusuario'];
        $_SESSION['rol'] = $user['rol'];
        $_SESSION['user_agent'] = $_SERVER['HTTP_USER_AGENT'];
        $_SESSION['last_activity'] = time();
        header("Location: ../index.php");
        exit;
    } else {
        echo "Credenciales incorrectas.";
    }
}
?>

<!-- Formulario de login -->
<form method="POST">
    Nombre: <input type="text" name="nombre" required><br>
    Contraseña: <input type="password" name="password" required><br>
    <button type="submit">Iniciar Sesión</button>
</form>
