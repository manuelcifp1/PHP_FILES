<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form action="subida_archivo.php" method="post">

        <label for="usuario">Usuario:</label>
        <input type="text" name="usuario" id="usuario" value="usuario" required>

        <label for="password">Contraseña:</label>
        <input type="text" name="password" id="password" value="password" required>

        <button type="submit">ENVIAR</button>
        
        <a href="./olvido_password.php">¿Has olvidado la contraseña?</a>
        <a href="./registro.php"></a>

    </form>
    <?php        

        if (!empty($_POST['usuario']) && !empty($_POST['password'])) {
            $usuario = htmlspecialchars($_POST['usuario']);
            $password = htmlspecialchars($_POST['password']);
            
            //Validamos datos con funciones.
            include 'funciones.php';
            validarUsuario($usuario);

            validarPassword($password);
        }
    
    ?>
    
</body>
</html>