<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recordatorio</title>
</head>
<body>
<?php
if (!empty($_POST['usuario']) && !empty($_POST['respuesta'])) {
    include 'funciones.php';
    $usuario = htmlspecialchars($_POST['usuario']);
    $respuesta = htmlspecialchars($_POST['respuesta']);

    $userData = buscarUsuario($usuario);
    if ($userData && $userData['respuesta'] === $respuesta) {
        $password = $userData['password'];
        echo "<p>$usuario</p>";
        echo "<p>Tu contraseña es $password</p>";
    } else {
        echo "<p>Respuesta incorrecta.</p>";
    }
}
?>
<a href="./login.php"><button>VOLVER A LOGIN</button></a>
</body>
</html>
