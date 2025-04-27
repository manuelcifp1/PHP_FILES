<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
</head>
<body>
    <form action="registro.php" method="post">
        <label for="username">Usuario:</label>
        <input type="text" name="username" id="username" value="<?= $_POST['username'] ?? '' ?>" required>

        <label for="password">Contraseña:</label>
        <input type="password" name="password" id="password" required>

        <label for="repite_password">Repite contraseña:</label>
        <input type="password" name="repite_password" id="repite_password" required>

        <button type="submit">REGISTRARSE</button>
    </form>

<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        //Creo variables con sus validaciones.
        $username = htmlspecialchars($_POST['username']);
        $password = htmlspecialchars($_POST['password']);
        $repite_password = htmlspecialchars($_POST['repite_password']);

        //Y vuelvo a usar mis funciones.
        include 'funciones.php';
        validarUsername($username);
        validarPassword($password);

        //Validación para ver si las dos contraseñas coinciden.
        if ($password !== $repite_password) {
            echo "<p>Las contraseñas no coinciden.</p>";
            //Si el usuario ya existe.
        } elseif (buscarUsername($username)) {
            echo "<p>El usuario ya existe.</p>";
            //Encriptamos contraseña.
        } else {
            // ✅ Hasheamos la contraseña antes de guardarla
            $passwordHasheada = password_hash($password, PASSWORD_DEFAULT);

            //Creo el array que terminará en el archivo JSON.
            $nuevo = [
                'username' => $username,
                'password' => $passwordHasheada,                
            ];
            guardarUsername($nuevo);
            echo "<p>Usuario registrado con éxito. <a href='login.html'>Ir al login</a></p>";
        }
    }
?>
</body>
</html>
