<?php
require_once '../model/usuario.php';
require_once 'seguridad.php';
Seguridad::iniciarSesion();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $password = $_POST['password'];

    $usuario = new Usuario();
    $result = $usuario->create($nombre, $password); // rol por defecto: 'cliente'

    if ($result) {
        header("Location: login.php?registro=ok");
        exit;
    } else {
        echo "Error al registrar usuario.";
    }
}
?>

<!-- Formulario de registro -->
<form method="POST">
    Nombre: <input type="text" name="nombre" required><br>
    Contraseña: <input type="password" name="password" required><br>
    <button type="submit">Registrarse</button>
</form>
