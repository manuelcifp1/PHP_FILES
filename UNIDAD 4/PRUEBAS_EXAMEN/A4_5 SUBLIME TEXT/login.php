<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
</head>
<body>
    <form action="login.php" method="post">

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>

        <label for="password">Contraseña:</label>
        <input type="password" name="password" id="password" required>

        <button type="submit">ENTRAR</button>
        <a href="registro.php">¿Aun no estás registrado?</a>
        
    </form>

    <?php
    //SESSION START
    session_start();

    //ENVÍO DATOS Y VALIDACIONES
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
       $email = $_POST['email'];
       $password = $_POST['password'];

       include "funciones.php";

       validarEmail($email);
       validarPassword($password);

       $email = htmlspecialchars($email);

        //ASIGNAR RESULTADO VERIFICAR CREDENCIALES A LA VARIABLE USUARIO.
        $usuario = verificarCredenciales($email, $password);

        //SI USUARIO ES TRUE, REALIZAR SECURES DE SESIÓN.
        if($usuario) {
            session_regenerate_id(true);
            $_SESSION['email'] = $email;
            $_SESSION['user_agent'] = $_SERVER['HTTP_USER_AGENT'];
            $_SESSION['last_activity'] = time();
            header("Location: productos.php");
            exit;
        } else {
            echo "<p style='color:red;'>Credenciales incorrectas.</p>";
        }
    }
    

    ?>    
</body>
</html>