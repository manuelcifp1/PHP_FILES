<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COMENTARIO</title>
</head>
<body>
    <?php
        function old($campo) {
            return isset($_GET[$campo]) ? htmlspecialchars($_GET[$campo], ENT_QUOTES, 'UTF-8') : '';
        }
    ?>
    <form action="#" method="get">
        <label for="nombre">Nombre: </label>
        <input type="text" name="nombre" id="nombre" value="<?= old('nombre'); ?>" required>

        <label for="email">Email: </label>
        <input type="email" name="email" id="email" value="<?= old('email'); ?>" required>

        <label for="apellido">Apellido: </label>
        <input type="text" name="apellido" id="apellido" value="<?= old('apellido'); ?>" required>    

        <label for="comentario">Comentario: </label>
        <textarea name="comentario" id="comentario" required><?= old('comentario'); ?></textarea>

        <button type="submit">Enviar</button>
    </form>

    <?php
        if (!empty($_GET['nombre']) && !empty($_GET['email']) && !empty($_GET['apellido']) && !empty($_GET['comentario'])) {
            $nombre = htmlspecialchars($_GET['nombre'], ENT_QUOTES, 'UTF-8');
            $email = filter_var($_GET['email'], FILTER_VALIDATE_EMAIL);
            $apellido = htmlspecialchars($_GET['apellido'], ENT_QUOTES, 'UTF-8');
            $comentario = htmlspecialchars($_GET['comentario'], ENT_QUOTES, 'UTF-8');

            if ($email) {
                echo "<p>Gracias, $nombre. Hemos recibido tu comentario</p>";
            } else {
                echo "<p>Correo electrónico inválido</p>";
            }
        } else {
            echo "<p>Todos los campos son obligatorios</p>";
        }
    ?>
</body>
</html>
