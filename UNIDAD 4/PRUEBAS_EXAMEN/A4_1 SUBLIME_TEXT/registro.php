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

    ?>

    </body>
</html>