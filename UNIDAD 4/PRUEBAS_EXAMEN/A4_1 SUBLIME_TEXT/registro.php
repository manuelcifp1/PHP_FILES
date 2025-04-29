<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
</head>
<body>
    <form method="post" action="login.html">

        <label for="username">Usuario:</label>
        <input type="text" name="username" required>

        <label for="password">Contraseña:</label>
        <input type="password" name="password" required>

        <label for="repite_password">Repetir contraseña:</label>
        <input type="password" name="repite_password" required>

        <button type="submit">ENVIAR</button>
        
    </form>

    <?php
    //ENVÍO DATOS Y VALIDACIONES
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $repite_password = $_POST['repite_password'];

        include "funciones.php";

        validarUsername($username);
        validarPassword($password);

        $username = htmlspecialchars($username);

        //SI LAS 2 CONTRASEÑAS SON DIFERENTES
       if($password !== $repite_password) {
        echo "<p>Las contraseñas no coinciden</p>";

        //SI BUSCARUSERNAME ES TRUE    
        } elseif (buscarUsername($username)) {
        echo "<p>Usuario ya registrado</p>";

        //Y YA EN EL CASO CORRECTO, ASIGNAMOS A $PASSWORDHASHEADA    
        } else {
        $passwordHasheada = password_hash($password, PASSWORD_DEFAULT);    

            //Y CREAMOS $NUEVO
            $nuevo = [
                'username' => $username,
                'password' => $passwordHasheada,
            ];

            //GUARDARUSERNAME($NUEVO) + MENSAJE ÉXITO + ENLACE A LOGIN.PHP
            guardarUsername($nuevo);
            echo "<p>Usuario registrado correctamente.</p>";
            echo "<a href='login.php'>Ir a login.</a>";
            
        }


    }
    ?>

    </body>
</html>