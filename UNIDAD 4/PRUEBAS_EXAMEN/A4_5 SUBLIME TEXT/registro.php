<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
</head>
<body>
    
    <form action="registro.php" method="post">
        
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" required>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>

        <label for="password">Contraseña:</label>
        <input type="password" name="password" id="password" required>

        <button type="submit">ENVIAR DATOS</button>

    </form>

    <?php
        //ENVÍO DE DATOS Y VALIDACIONES
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nombre = $_POST['nombre'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            include "funciones.php";

            validarNombre($nombre);
            validarEmail($email);
            validarPassword($password);

            $nombre = htmlspecialchars($nombre);
            $email = htmlspecialchars($email);

            //SI REGISTRARUSUARIO(param) ES TRUE, EXITO Y A LOGIN.
            if(registrarUsuario($nombre, $email, $password)) {
                echo "<p>Registro exitoso.</p>";
                echo "<p><a href='login.php'>INICIAR SESIÓN</a></p>";
            }
        }


    ?>    
</body>