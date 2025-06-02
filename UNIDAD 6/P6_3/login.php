<?php
session_start();
require_once 'models/Usuarios.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    $usuarioModel = new Usuarios();
    $usuario = $usuarioModel->buscarPorUsername($username);

    if ($usuario && password_verify($password, $usuario['password'])) {
        session_regenerate_id(true); // previene fijación de sesión
        $_SESSION['user_id'] = $usuario['id'];
        $_SESSION['username'] = $usuario['username'];
        header('Location: contacto.php?action=list');
        exit;
    } else {
        $error = 'Usuario o contraseña incorrectos';
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
    <form method="POST">
        <label>Usuario: <input type="text" name="username" required></label><br>
        <label>Contraseña: <input type="password" name="password" required></label><br>
        <button type="submit">Entrar</button>
    </form>
</body>
</html>
