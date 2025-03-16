<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SACA AL PERRO JODER</title>
</head>
<body>
    <form action="#" method="get">
        <textarea name="nombres" id="nombres" value="nombres"></textarea>
        <button type="submit">ENVIAR</button>
    </form>
    <?php
    if(isset($_GET['nombres'])) {
        $nombres = $_GET['nombres'];
        $nombres = explode(' ', $nombres);
        $aleatorio = rand(0, (count($nombres) - 1));
        echo $nombres[$aleatorio] . " saca al perro.<br>";
    } ?>
    
</body>
</html>