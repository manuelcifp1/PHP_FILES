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
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = htmlspecialchars($_POST['username']);
            $password = htmlspecialchars($_POST['password']);
            $repite_password = htmlspecialchars($_POST['repite_password']);


            include "funciones.php";

            validarUsername($username);
            validarPassword($password);


            if($password !== $repite_password) {
                echo "<p style='color: red;'>Las contraseñas no coinciden.</p>";                
            } elseif (buscarUsername($username)) {
                echo "<p>Usuario ya registrado.</p>";
            } else {
                $passwordHasheada = password_hash($password, PASSWORD_DEFAULT);

                $nuevo = [
                    'username' => $username,
                    'password' => $passwordHasheada,
                ];

                guardarUsername($nuevo);

                echo "<p>Se ha registrado correctamente.</p>";
                header("Location: login.html");
                exit;
            }
        }

    ?>

    </body>
</html>