<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="#" method="get">
        <label for="nombre">Nombre: </label>
        <input type="text" name="nombre" id="nombre" <?php if (!empty($_REQUEST['nombre'])): ?> value="<?php echo $_REQUEST['nombre']; ?>"<?php endif; ?> required>

        <label for="email">Email: </label>
        <input type="email" name="email" id="email" <?php if (!empty($_REQUEST['email'])): ?> value="<?php echo $_REQUEST['email']; ?>"<?php endif; ?> required>

        <label for="comentario">Comentario: </label>
        <textarea name="comentario" id="comentario"></textarea>

        <button type="submit">Enviar</button>
    </form>
    <?php
        if(isset ($_REQUEST['nombre']) && isset($_REQUEST['email'])  && isset($_REQUEST['comentario'])) {
            $nombre = $_GET['nombre'];
            $email = $_GET['email'];
            $comentario = $_GET['comentario'];

            echo "<p>Gracias, $nombre. Hemos recibido tu comentario</p>";
        }
    
    ?>
    
</body>
</html>