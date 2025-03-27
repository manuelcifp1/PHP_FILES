<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
</head>
<body>
    <form action="registro.php" method="post">
        <label for="usuario">Usuario:</label>
        <input type="text" name="usuario" id="usuario" value="<?= $_POST['usuario'] ?? '' ?>" required>

        <label for="password">Contraseña:</label>
        <input type="text" name="password" id="password" required>

        <label for="repite_password">Repite contraseña:</label>
        <input type="text" name="repite_password" id="repite_password" required>

        <label for="pregunta">Dime tu pregunta secreta:</label>
        <input type="text" name="pregunta" id="pregunta" value="<?= $_POST['pregunta'] ?? '' ?>" required>

        <label for="respuesta">Respuesta:</label>
        <input type="text" name="respuesta" id="respuesta" value="<?= $_POST['respuesta'] ?? '' ?>" required>

        <button type="submit">REGISTRARSE</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $usuario = htmlspecialchars($_POST['usuario']);
        $password = htmlspecialchars($_POST['password']);
        $repite_password = htmlspecialchars($_POST['repite_password']);
        $pregunta = htmlspecialchars($_POST['pregunta']);
        $respuesta = htmlspecialchars($_POST['respuesta']);

        include 'funciones.php';
        validarUsuario($usuario);
        validarPassword($password);

        if ($password !== $repite_password) {
            echo "<p>Las contraseñas no coinciden.</p>";
        } elseif (buscarUsuario($usuario)) {
            echo "<p>El usuario ya existe.</p>";
        } else {
            $nuevo = [
                'usuario' => $usuario,
                'password' => $password,
                'pregunta' => $pregunta,
                'respuesta' => $respuesta
            ];
            guardarUsuario($nuevo);
            echo "<p>Usuario registrado con éxito. <a href='login.php'>Ir al login</a></p>";
        }
    }
    ?>
</body>
</html>
