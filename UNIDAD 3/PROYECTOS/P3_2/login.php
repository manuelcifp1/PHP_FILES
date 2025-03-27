<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
<!--En action incluimos el nombre del archivo de subida de idems. Si todo está correcto aquí, te redirecciona directamente a él.-->
    <form action="subida_archivo.php" method="post">
        <label for="usuario">Usuario:</label>
        <input type="text" name="usuario" id="usuario" required>

        <label for="password">Contraseña:</label>
        <input type="text" name="password" id="password" required>

        <button type="submit">ENVIAR</button>

        <a href="./olvido_password.php">¿Has olvidado la contraseña?</a>
        <a href="./registro.php">Registrarse</a>
    </form>

    <?php        
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['usuario']) && !empty($_POST['password'])) {
        $usuario = htmlspecialchars($_POST['usuario']);
        $password = htmlspecialchars($_POST['password']);
        
        //Uso las funciones de validación.
        include 'funciones.php';
        validarUsuario($usuario);
        validarPassword($password);

        //Uso la función para buscar al usuario por si ya existe o no, y compruebo su contraseña.
        $datosUsuario = buscarUsuario($usuario);
        if (!$datosUsuario || $datosUsuario['password'] !== $password) {
            echo "<p>Usuario o contraseña incorrectos.</p>";
        }        
    }
    ?>
</body>
</html>
