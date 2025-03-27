<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Olvido password</title>
</head>
<body>
    <form action="./login.php" method="post">

        <label for="usuario">Dime tu nombre de usuario:</label>
        <input type="text" name="usuario" id="usuario" value="" required>
        <button type="submit">Enviar</button>

        <label for="respuesta">¿De qué color es el caballo blanco de Santiago?</label>
        <input type="text" name="respuesta" id="respuesta" value="" required>
        
    </form>

    <?php
        if (!empty($_POST['usuario']) && !empty($_POST['respuesta'])) {
            $usuario = htmlspecialchars($_POST['usuario']);        
            $respuesta = htmlspecialchars($_POST['respuesta']);
            
            //Validamos datos con funciones.
            include 'funciones.php';
            validarUsuario($usuario);
            
        }

    ?>
    
</body>
</html>