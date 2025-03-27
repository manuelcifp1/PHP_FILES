<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
</head>
<body>
    <form action="./login.php" method="post">

        <label for="usuario">Usuario:</label>
        <input type="text" name="usuario" id="usuario" <?php if(!empty ($_REQUEST['usuario'])):?> value="<?php echo $_REQUEST['usuario'];?>" <?php endif;?> required>

        <label for="password">Contraseña:</label>
        <input type="text" name="password" id="password" required>

        <label for="password">Repite contraseña:</label>
        <input type="text" name="password" id="password" required>

        <label for="pregunta">Dime tu pregunta secreta:</label>
        <input type="text" name="pregunta" id="pregunta" <?php if(!empty ($_REQUEST['pregunta'])):?> value="<?php echo $_REQUEST['pregunta'];?>" <?php endif;?> required>

        <label for="respuesta">Usuario:</label>
        <input type="text" name="respuesta" id="respuesta" <?php if(!empty ($_REQUEST['respuesta'])):?> value="<?php echo $_REQUEST['respuesta'];?>" <?php endif;?> required>
        
    </form>
    
    <?php
    if (!empty($_POST['usuario']) && !empty($_POST['password'])  && !empty($_POST['pregunta']) && !empty($_POST['respuesta'])) {
        $usuario = htmlspecialchars($_POST['usuario']);
        $password = htmlspecialchars($_POST['password']);
        $pregunta = htmlspecialchars($_POST['pregunta']);
        $respuesta = htmlspecialchars($_POST['respuesta']);

        
        //Validamos datos con funciones.
        include 'funciones.php';
        validarUsuario($usuario);

        validarPassword($password);
    }

    ?>
</body>
</html>