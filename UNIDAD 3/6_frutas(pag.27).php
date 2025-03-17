<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FRUTAS EN ARRAY</title>
</head>
<!--Presentar un formulario donde preguntar: ¿Cuántas frutas deseas indicar?
● Cuando el usuario me ha indicado el número de frutas, simplemente
crearemos un formulario dinámico con una serie de campos input, tantos
como frutas quería indicar.
● Por último haremos un recorrido para recibir todas las frutas y mostrarlas
en la página.-->
<body>
    <form action="#" method="get">
        <label for="cuantas">¿Cuantas frutas quieres introducir?</label>
        <input type="number" name="cuantas" id="cuantas" required>
        <button type="submit">ENVIAR</button>
    </form>
    <?php

    if(!empty($_GET['cuantas'])) {
        $cuantas = htmlspecialchars($_GET['cuantas'], ENT_QUOTES, 'UTF-8');

        
    }

    ?>
    
</body>
</html>