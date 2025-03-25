<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyecto P3-1</title>
</head>
<body>
<!--Creo un formulario con los datos pertinentes. El campo direccion es un desplegable con dos opciones: calle o avenida.-->
    <form action="#" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" value="nombre" id="nombre" required>

        <label for="apellidos">Apellidos:</label>
        <input type="text" name="apellidos" value="apellidos" id="apellidos" required>

        <label for="direccion">Dirección:</label>
        <select name="direccion" id="direccion">
            <option value="calle">Calle</option>
            <option value="avenida">Avenida</option>
        </select>
        <button type="submit">ENVIAR</button>
    </form>

    <?php

    //Creamos 3 arrays: el primero para validar la opción seleccionada de dirección, los otros dos que contienen las calles y avenidas respectivamente.
    $opcionesDireccion = ['calle', 'avenida'];
    $calles = ['Real', 'Independencia', 'Recinto Sur'];
    $avenidas = ['España', 'Sanidad Pública', 'De La República'];

    //Comenzamos el proceso de envío con comprobación de método.
    if($_SERVER('REQUEST_METHOD') === $_POST) {

        //Segundo filtro: validación de campos vacíos y también comprobamos que la selección hecha en dirección está en el array opcionesDirección (esto lo hacemos porque podría alterarse maliciosamente.)
        if(!empty($_POST['nombre']) && !empty($_POST['apellidos']) && !empty($_POST['direccion']) && in_array($_POST['direccion'], $opcionesDireccion)) {

            //Creamos variables y hacemos validación de los campos de texto.
            $nombre = htmlspecialchars($_POST['nombre']);
            $apellidos = htmlspecialchars($_POST['apellidos']);
            $direccion = $_POST['direccion'];

            

        }
        
    }

    ?>

    
</body>
</html>