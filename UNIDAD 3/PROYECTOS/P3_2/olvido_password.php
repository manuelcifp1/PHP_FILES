<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Olvido password</title>
</head>
<body>
    <form action="recordatorio.php" method="post">
        <label for="usuario">Dime tu nombre de usuario:</label>
        <input type="text" name="usuario" id="usuario" required>
        <button type="submit">Enviar</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['usuario'])) {
        include 'funciones.php';
        $usuario = htmlspecialchars($_POST['usuario']);
        validarUsuario($usuario);
        $userData = buscarUsuario($usuario);

        if ($userData) {
            //Mostramos la pregunta secreta si se encuentra
            $pregunta = $userData['pregunta'];
            echo "
            <form action='recordatorio.php' method='post'>
                <input type='hidden' name='usuario' value='$usuario'>
                <label for='respuesta'>{$pregunta}</label>
                <input type='text' name='respuesta' id='respuesta' required>
                <button type='submit'>Ver contraseña</button>
            </form>";
        } else {
            echo "<p>Usuario no encontrado.</p>";
        }
    }
    ?>
</body>
</html>
