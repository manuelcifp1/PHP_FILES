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
        $cuantas = 0;//Esto evita errores de variables no definidas.
        if(!empty($_GET['cuantas'])) {
            $cuantas = (int) $_GET['cuantas'];
        }
    ?>    
    <form action="#" method="get">
        <?php
        for($i = 1; $i <= $cuantas; $i++) :?>
        <label for="frutas">Introduce fruta <?= $i ?></label>
        <input type="text" name="frutas[]" value="fruta <?= $i?>" id="fruta <?= $i?>">        
        <?php endfor; ?>
        <button type="submit">ENVIAR</button>
    </form>
    <?php
        if(!empty($_GET['frutas'])) {
            foreach($_GET['frutas'] as $fruta) {
                echo "$fruta<br>";
            } 
        }
    ?>    
</body>
</html>