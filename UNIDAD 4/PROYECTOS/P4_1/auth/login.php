<?php
//Aquí se inicia sesión.

require_once '../includes/funciones.php';

$mensaje = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    
    //Asigna el return de verificar los datos a la variable $usuario.
    $usuario = verificarCredenciales($email, $password);

    //Se añade la seguridad propia de las sesiones.
    if ($usuario) {
        session_regenerate_id(true); //Regeneración del ID de sesión actual
        $_SESSION['usuario'] = $usuario;
        $_SESSION['user_agent'] = $_SERVER['HTTP_USER_AGENT']; //Se guarda el user agent con datos del navegador, SO, etc...
        $_SESSION['last_activity'] = time(); //Se guarda la hora de la última actividad
        header("Location: ../index.php");
        exit;
    }

    //Da la respuesta adecuada según el usuario esté previamente registrado o no.
    //Si las credenciales no coinciden, se muestra mensaje de error
    $mensaje = 'Credenciales incorrectas.';
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión</title>
</head>
<body>
    <h1>Iniciar Sesión</h1>

    <?php if (!empty($mensaje)): ?>
    <!--Estilo en rojo para el mensaje de error.-->
        <p style="color:red;"><?php echo htmlspecialchars($mensaje); ?></p>
    <?php endif; ?>

    <form method="POST">
        <label>Email:</label><br>
        <input type="email" name="email" required><br><br>

        <label>Contraseña:</label><br>
        <input type="password" name="password" required><br><br>

        <button type="submit">Entrar</button>
    </form>

    <p><a href="../index.php">Volver al inicio</a></p>
</body>
</html>
