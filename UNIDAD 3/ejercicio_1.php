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
        <input type="text" name="nombre" id="nombre" required>

        <label for="email">Email: </label>
        <input type="email" name="email" id="email" required>

        <label for="comentario">Comentario: </label>
        <textarea name="comentario" id="comentario"></textarea>

        <button type="submit">Enviar</button>
    </form>
    <?php
        if($_REQUEST['nombre'] && $_REQUEST['email'] && $_REQUEST['comentario']) {
            $nombre = $_GET['nombre'];
            $email = $_GET['email'];
            $comentario = $_GET['comentario'];

            echo "<p>Gracias, $nombre. Hemos recibido tu comentario</p>";
        }
    
    ?>
    
</body>
</html>