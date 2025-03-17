<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COMENTARIO</title>
</head>
<body>
<!--
Crea una página web en PHP que contenga un formulario con los siguientes campos:
● Nombre (input tipo texto)
● Email (input tipo email)
● Comentario (input tipo textarea)
Cuando el usuario envíe el formulario, se debe procesar la información en la misma página y mostrar un
mensaje con los datos enviados. Para ello, deberás usar la función isset() para verificar si el formulario ha
sido enviado, y el array superglobal $_REQUEST para obtener los valores de los campos del formulario.
● El formulario debe aparecer siempre en la página.
● Si los datos fueron enviados correctamente, debajo del formulario debe aparecer un mensaje que diga:
"Gracias, [Nombre]. Hemos recibido tu comentario."
● Asegúrate de que los datos enviados se mantengan en los campos del formulario después del envío.-->

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
            $nombre = trim(strtolower($nombre));
            echo "<p>Gracias, $nombre. Hemos recibido tu comentario</p>";
        }           
    ?>
    
</body>
</html>