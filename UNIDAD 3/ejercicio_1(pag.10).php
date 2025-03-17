<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COMENTARIO</title>
</head>
<body>
    <form action="#" method="get">
        <label for="nombre">Nombre: </label>
        <input type="text" name="nombre" id="nombre" <?php if(!empty($_GET['nombre'])):?> value="<?php echo htmlspecialchars($_GET['nombre'], ENT_QUOTES, 'UTF-8');?>" <?php endif;?> required>

        <label for="email">Email: </label>
        <input type="email" name="email" id="email" <?php if(!empty($_GET['email'])):?> value="<?php echo filter_var($_GET['email'], FILTER_VALIDATE_EMAIL);?>" <?php endif;?> required>

        <label for="apellido">Apellido: </label>
        <input type="text" name="apellido" id="apellido" <?php if(!empty($_GET["apellido"])):?> value="<?php echo htmlspecialchars($_GET['apellido'], ENT_QUOTES, 'UTF-8');?>" <?php endif;?> required>    

        <label for="comentario">Comentario: </label>
        <textarea name="comentario" id="comentario"></textarea>

        <button type="submit">Enviar</button>
    </form>
    <?php
        if(!empty ($_GET['nombre']) && !empty($_GET['email'])  && !empty($_GET['apellido']) && !empty($_GET['comentario'])) {
            $nombre = $_GET['nombre'];
            echo "<p>Gracias, $nombre. Hemos recibido tu comentario</p>";
        }           
    ?>
    
</body>
</html>