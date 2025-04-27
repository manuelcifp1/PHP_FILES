<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
</head>
<body>
<!-- 
Formulario de Inicio de Sesión y Manejo de Sesiones:
- Formulario con campos email y password.
- Verifica credenciales contra la base de datos.
- Guarda user_id en sesión si credenciales correctas.
- Usa password_verify.
-->

<form action="login.php" method="post">
    <label for="email">Email:</label>
    <input type="email" name="email" id="email" required>

    <label for="password">Contraseña:</label>
    <input type="password" name="password" id="password" required>

    <button type="submit">ENTRAR</button>
    <a href="registro.php">¿Aún no estás registrado?</a>
</form>

<?php
session_start(); // Iniciamos sesión al principio

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    include "funciones.php";

    // Validamos email y contraseña
    validarEmail($email);
    validarPassword($password);

    // Escapamos solo el email para HTML si es necesario mostrarlo
    $email = htmlspecialchars($email);

    // Verificamos credenciales
    $usuario = verificarCredenciales($email, $password);

    if ($usuario) {
        // Seguridad de sesión
        session_regenerate_id(true);
        $_SESSION['usuario'] = $usuario;
        $_SESSION['user_agent'] = $_SERVER['HTTP_USER_AGENT'];
        $_SESSION['last_activity'] = time();
        header("Location: productos.php"); // Redireccionamos a productos si login correcto
        exit;
    } else {
        echo "<p style='color:red;'>Credenciales incorrectas.</p>";
    }
}
?>
</body>
</html>
