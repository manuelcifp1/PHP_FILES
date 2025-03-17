<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SPAM</title>
</head>
<body>
<!--
Realiza un formulario con los siguientes datos: nombre, teléfono, email y mensaje.
● Cuando se pulse en enviar debe mostrar la siguiente plantilla:
                “Hola nombre!
                Te voy a enviar spam a correo y te llamaré por la madrugada al telefono.
                mensaje
                Enviado desde un iPhone”-->
    <form action="#" method="get">
        <label for="nombre">Nombre: </label>
        <input type="text" name="nombre" id="nombre" <?php if(!empty($_REQUEST['nombre'])):?> value="<?php echo $_REQUEST['nombre'];?>" <?php endif;?> required>

        <label for="telefono">Teléfono: </label>
        <input type="text" name="telefono" id="telefono" <?php if(!empty($_REQUEST['telefono'])):?> value="<?php echo $_REQUEST['telefono'];?>" <?php endif;?> required>

        <label for="email">Email: </label>
        <input type="email" name="email" id="email" <?php if(!empty($_REQUEST['email'])):?> value="<?php echo $_REQUEST['email'];?>" <?php endif;?> required>

        <label for="mensaje">Mensaje: </label>
        <input type="text" name="mensaje" id="mensaje" <?php if(!empty($_REQUEST['mensaje'])):?> value="<?php echo $_REQUEST['mensaje'];?>" <?php endif;?> required>

        <button type="submit">ENVIAR</button>    
    </form>

    <?php

        if(!empty($_REQUEST['nombre']) && !empty($_REQUEST['telefono']) && !empty($_REQUEST['email']) && !empty($_REQUEST['mensaje'])) {
            $nombre = htmlspecialchars($_REQUEST['nombre']);
            $nombre = trim(strtolower($nombre));
            $telefono = htmlspecialchars($_REQUEST['telefono']);
            $email = htmlspecialchars($_REQUEST['email']);
            $mensaje = htmlspecialchars($_REQUEST['mensaje']);

            echo "<p>Hola $nombre!<br>
                    Te voy a enviar spam a $email y te llamaré por la madrugada al $telefono.<br>
                    $mensaje <br>
                    Enviado desde un iPhone.<br></p>";
        }

    ?>
    
</body>
</html>