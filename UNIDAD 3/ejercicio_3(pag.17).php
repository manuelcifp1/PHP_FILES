<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SACA AL PERRO JODER</title>
</head>
<body>
<!--
● Escribe en un textarea una lista de nombres.
● Cuando pulses un botón debes mostrar un nombre aleatorio. (Será el
encargado de sacar al perro)
● Muestra con la siguiente plantilla: $nombre saca al perro.-->
    <form action="#" method="get">
        <textarea name="nombres" id="nombres" value="nombres"></textarea>
        <button type="submit">ENVIAR</button>
    </form>
    <?php
    if(!empty($_GET['nombres'])) {
        $nombres = $_GET['nombres'];
        $nombres = explode(' ', $nombres);
        $aleatorio = rand(0, (count($nombres) - 1));
        echo $nombres[$aleatorio] . " saca al perro.<br>";
    } ?>
    
</body>
</html>