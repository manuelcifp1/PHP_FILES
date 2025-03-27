<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Olvido password</title>
</head>
<body>
    <?php
    include 'funciones.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        //Nos ahorramos el isset usando el operador fusión null.
        $usuario = htmlspecialchars($_POST['usuario'] ?? '');
        $respuesta = htmlspecialchars($_POST['respuesta'] ?? '');

        //Validaciones con las funciones del archivo del mismo nombre.
        if (!empty($usuario)) {
            validarUsuario($usuario);
            //Y búsqueda del usuario para ver si existe.
            $datosUsuario = buscarUsuario($usuario);

            if (!$datosUsuario) {
                echo "<p>Usuario no encontrado.</p>";
            } elseif (empty($respuesta)) {
                //Primera fase: mostramos la pregunta secreta creando código html dinámicamente.
                $pregunta = $datosUsuario['pregunta'];
                echo "
                <form action='olvido_password.php' method='post'>
                    <input type='hidden' name='usuario' value='$usuario'>
                    <label for='respuesta'>{$pregunta}</label>
                    <input type='text' name='respuesta' id='respuesta' required>
                    <button type='submit'>Ver contraseña</button>
                </form>";
            } else {
                //Segunda fase: compruebo la respuesta y muestro la contraseña extrayéndola de $datosUsuario.
                if ($datosUsuario['respuesta'] === $respuesta) {
                    $password = $datosUsuario['password'];
                    echo "<p>$usuario</p>";
                    echo "<p>Tu contraseña es: <strong>$password</strong></p>";
                } else {
                    echo "<p>Respuesta incorrecta.</p>";
                }
            }
        }
    }
    ?>

    <!--Y aquí está el formulario inicial.-->
    <form action="olvido_password.php" method="post">
        <label for="usuario">Dime tu nombre de usuario:</label>
        <input type="text" name="usuario" id="usuario" required>
        <button type="submit">Enviar</button>
    </form>
<!--Enlace para volver al login.-->
    <a href="./login.php"><button>VOLVER A LOGIN</button></a>
</body>
</html>
