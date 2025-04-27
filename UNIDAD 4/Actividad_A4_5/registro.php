<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<!--Formulario de Registro de Usuario:
Crea un archivo que muestre un formulario de registro con los campos
 nombre, email y password.
 Al enviar el formulario, guarda la información del usuario en la tabla usuarios
  de la base de datos.Asegúrate de encriptar la contraseña del usuario antes de guardarla,
   usando password_hash.Maneja los errores de inserción, como duplicados en el campo email,
    y muestra un mensaje de error si ocurre.-->

    <form action="registro.php" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" value="nombre" required>

        <label for="email">Email:</label>
        <input type="email" value="email" required>

        <label for="password">contraseña</label>
        <input type="password" value="password" required>

        <button type="submit">ENVIAR DATOS</button>
    </form>
    
</body>
</html>
<?php
if($_SERVER('REQUEST_METHOD') == 'POST') {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    include "funciones.php";

    validarNombre($nombre);
    validarEmail($email);
    validarPassword($password);

    $nombre = htmlspecialchars($nombre);
    $email = htmlspecialchars($email);

    
}




