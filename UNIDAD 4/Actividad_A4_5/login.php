<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!--Formulario de Inicio de Sesión y Manejo de Sesiones
Crea un archivo login.php que contenga un formulario de inicio de sesión con los campos email y password.
Al enviar el formulario, verifica las credenciales contra los datos de la base de datos:

- Si el usuario existe y la contraseña es correcta, guarda el user_id en una sesión de PHP
 para indicar que el usuario está conectado.
- Si las credenciales no coinciden, muestra un mensaje de error.

Usa password_verify para comparar la contraseña ingresada con la contraseña encriptada en la base de datos.-->
<form action="productos.php" method="post">

    <label for="email">Email:</label>
    <input type="email" name="email" required>

    <label for="password">Contraseña:</label>
    <input type="password" name="password">

    <button type="submit">ENTRAR</button>
    <a href="registro.php">¿Aún no estás registrado</a>
</form>
<?php
session_start();

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $email = $_POST['email'];
        $password = $_POST['password'];

        include "funciones.php";
        validarEmail($email);
        validarPassword($password);

        $email = htmlspecialchars($email);
        $password = htmlspecialchars($password);

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

</body>
</html>