<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<!--● Muestra la siguiente adivinanza:
“Esta cosa se devora a todas las cosas;
Pájaros, bestias, árboles, flores;
Carcome el hierro, muerde el acero;
Muele duras piedras y las reduce a harina;
Mata al rey, arruina la ciudad,
Y derriba a la montaña.”
● En un input, pide la respuesta.
● Añade un botón de submit.
● Si se pulsa el botón debes comprobar si ha acertado. La respuesta es: Tiempo.
● Si acierta felicítale.
● Si pierde, muestra la respuesta y cómetelo.-->

    <h2>ADIVINANZA:</h2>
    <h3>“Esta cosa se devora a todas las cosas;<br>
        Pájaros, bestias, árboles, flores;<br>
        Carcome el hierro, muerde el acero;<br>
        Muele duras piedras y las reduce a harina;<br>
        Mata al rey, arruina la ciudad,<br>
        Y derriba a la montaña.”<br></h3>

        <form action="#" method="get">
            <label for="respuesta">Introduce la respuesta:</label>
            <input type="text" name="respuesta" id="respuesta" <?php if(!empty($_GET['respuesta'])):;?> value="<?php echo htmlspecialchars($_GET['respuesta']); ?> <?php endif; ?>" required>
            <button type="submit">Enviar</button>
        </form>

        <?php
            if(!empty($_GET['respuesta'])) {
                $respuesta = htmlspecialchars($_GET['respuesta']);
                $respuesta = trim(strtolower($respuesta));
                $respuesta = strtolower($respuesta);

                if ($respuesta == "tiempo") {
                    echo "<h4>¡Enhorabuena, acertaste!</h4>";
                } else {
                    echo "Error. La respuesta es 'tiempo'.<br><h1>¡ÑAM!</h1>";
                }
            }
        ?>    
</body>
</html>