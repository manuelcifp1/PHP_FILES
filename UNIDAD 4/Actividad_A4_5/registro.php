<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
</head>
<body>
<!-- 
Formulario de Registro de Usuario:
Crea un archivo que muestre un formulario de registro con los campos
nombre, email y password.
Al enviar el formulario, guarda la información del usuario en la tabla usuarios
de la base de datos. Asegúrate de encriptar la contraseña del usuario antes de guardarla,
usando password_hash. Maneja los errores de inserción, como duplicados en el campo email,
y muestra un mensaje de error si ocurre.
-->

<form action="registro.php" method="post">
    <label for="nombre">Nombre:</label>
    <!-- Corregido: name="nombre" añadido -->
    <input type="text" name="nombre" id="nombre" required>

    <label for="email">Email:</label>
    <!-- Corregido: name="email" añadido -->
    <input type="email" name="email" id="email" required>

    <label for="password">Contraseña:</label>
    <!-- Corregido: name="password" añadido -->
    <input type="password" name="password" id="password" required>

    <button type="submit">ENVIAR DATOS</button>
</form>

<?php
// PHP para procesar el registro
if ($_SERVER['REQUEST_METHOD'] === 'POST') { // Corregido el acceso correcto
    // Capturamos datos del formulario
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    include "funciones.php"; // Incluimos funciones auxiliares

    // Validamos los datos recibidos
    validarNombre($nombre);
    validarEmail($email);
    validarPassword($password);

    // Solo escapamos nombre y email para HTML (no contraseña)
    $nombre = htmlspecialchars($nombre);
    $email = htmlspecialchars($email);

    // Registramos el usuario
    if (registrarUsuario($nombre, $email, $password)) {
        echo "<p>Registro exitoso. <a href='login.php'>Iniciar sesión</a></p>";
    } else {
        echo "<p>El email ya está registrado. <a href='login.php'>Iniciar sesión</a></p>";
    }
}
?>
</body>
</html>
