<?php
//3 arrays relacionados con el campo 'direccion': el primero para validar la opción seleccionada de 'direccion', los otros dos que contienen las calles y avenidas respectivamente.
$opcionesDireccion = ['calle', 'avenida'];
$calles = ['Real', 'Independencia', 'Recinto Sur'];
$avenidas = ['España', 'Sanidad Pública', 'De La República'];

//Creo la variable fase, con la que controlaré si se ha subido cada formulario mediante campos hidden (ocultos). Habrá una verificación de fase en cada envío con el valor correspondiente a esa fase (1, 2 o 3).
$fase = 1; //1 = primer formulario, 2 = segundo formulario, 3 = subida final y mensaje de éxito.
$errores = [];//Array para almacenar errores.

//Pre-definición de las variables para evitar errores tipo "undefined".
$nombre = '';
$apellidos = '';
$direccion = '';
$viaSeleccionada = '';

//Fase 1: lógica primer formulario====================================================================================================================================================
//Envío que incluye comprobación de la existencia de fase y su valor correcto en este momento (1).
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['fase']) && $_POST['fase'] === '1') {

    //Validación de datos de 3 maneras: htmlspecialchars, trim y con un operador de fusión null para comprobar que la variable existe y no es null. Si lo fuera, usaría el valor ''. 
    $nombre = htmlspecialchars(trim($_POST['nombre'] ?? ''));
    $apellidos = htmlspecialchars(trim($_POST['apellidos'] ?? ''));
    $direccion = $_POST['direccion'] ?? '';
    $viaSeleccionada = $_POST['via_seleccionada'] ?? '';

    //Validación de 'nombre' con RegEx, que incluye a los nombres compuestos (Ej: Jose María).
    if (!preg_match("/^[A-Za-zÁÉÍÓÚáéíóúÑñÜü'´ ]+$/", $nombre)) {
        $errores[] = "Nombre no válido.";
    }

    //Validación de 'apellidos' con RegEx. Es la misma RegEx que para 'nombre', ya que los apellidos son 2 o más palabras, así que incluye el espacio como carácter válido.
    if (!preg_match("/^[A-Za-zÁÉÍÓÚáéíóúÑñÜü'´ ]+$/", $apellidos)) {
        $errores[] = "Apellidos no válidos.";
    }

    //Compruebo que las opciones seleccionadas en dirección, calles y avenidas están en sus respectivos arrays (porque podrían añadirse otras opciones maliciosamente).
    if (!in_array($direccion, $opcionesDireccion)) {
        $errores[] = "ATENCIÓN: hemos detectado un intento de manipulación maliciosa de esta web. Su IP ha sido localizada y la policía se personará en su domicilio en pocos minutos.";
    }

    if ($direccion === 'calle' && !in_array($viaSeleccionada, $calles)) {
        $errores[] = "ATENCIÓN: hemos detectado un intento de manipulación maliciosa de esta web. Su IP ha sido localizada y la policía se personará en su domicilio en pocos minutos.";
    }

    if ($direccion === 'avenida' && !in_array($viaSeleccionada, $avenidas)) {
        $errores[] = "ATENCIÓN: hemos detectado un intento de manipulación maliciosa de esta web. Su IP ha sido localizada y la policía se personará en su domicilio en pocos minutos.";
    }

    //Cambio el valor de fase a 2 y guardo los datos en el archivo usuario.txt en formato JSON.
    if (empty($errores)) {
        $fase = 2;

        //Primero creo un array con los datos.
        $datos = [
            'nombre' => $nombre,
            'apellidos' => $apellidos,
            'direccion_tipo' => $direccion,
            'direccion_valor' => $viaSeleccionada
        ];        
        //Luego lo convierto a JSON:
        $json = json_encode($datos, JSON_UNESCAPED_UNICODE);

        //Y añado su contenido a usuario.txt. Con PHP_EOL, se crea un salto de línea despues de cada conjunto de datos. 
        file_put_contents('usuarios/usuario.txt', $json . PHP_EOL, FILE_APPEND);
    }
}

//Fase 2: lógica segundo formulario================================================================================================================================
//Las mismas comprobaciones de fase, esta vez la 2.
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['fase']) && $_POST['fase'] === '2') {
    //Comprobación de archivo.
    if (isset($_FILES['archivo'])) {
        $archivo = $_FILES['archivo'];
        //Comprobación de ausencia de errores, estableciendo los parámetros que limitan el tamaño y la extensión.
        if ($archivo['error'] === UPLOAD_ERR_OK) {
            $ext = strtolower(pathinfo($archivo['name'], PATHINFO_EXTENSION));
            $permitidas = ['jpg', 'png'];
            $tamanio = 2 * 1024 * 1024;
            //Si la extensión del archivo y su tamaño son correctos, se permite la subida.
            if (in_array($ext, $permitidas) && $archivo['size'] <= $tamanio) {

                /*Esto es muy bueno: Aquí establezco la ruta usando la constante __DIR__ , que es una forma abreviada de representar el directorio actual
                 en el que está el archivo index.php. Luego se añade el nombre de la carpeta en cuestión y todo arreglado. También uso la validación basename,
                 que elimina cualquier posible ruta maliciosa añadida por un usuario con malas intenciones.*/
                $destino = __DIR__ . '/DNI/' . basename($archivo['name']);

                //Mover el archivo a su destino definitivo.
                if (!file_exists($destino)) {
                    move_uploaded_file($archivo['tmp_name'], $destino);
                    //Cambio del valor de la variable a la última fase.
                    $fase = 3;
                } 
            } else {
                $errores[] = "Archivo no válido.";
            }
        } else {
            $errores[] = "Error al subir el archivo.";
        }
    }
}
?>
<!--Comienzo del código HTML=======================================================================================================================================-->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Proyecto P3-1</title>
</head>
<body>
<!--Aquí el if que hace aparecer el primer formulario, usando la variable fase.====================================================================================-->
<?php if ($fase === 1): ?>
    <!-- Primer formulario -->
    <form method="POST">
        <!--IMPORTANTE: con esto comprobamos que se ha enviado el primer formulario. Es un campo oculto.-->
        <input type="hidden" name="fase" value="1">

        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" required value="<?= htmlspecialchars($nombre) ?>">

        <label for="apellidos">Apellidos:</label>
        <input type="text" name="apellidos" id="apellidos" required value="<?= htmlspecialchars($apellidos) ?>">

        <label for="direccion">Dirección:</label>
        <select name="direccion" id="direccion" required>
            <option value="">Selecciona</option>
            <option value="calle" <?= $direccion === 'calle' ? 'selected' : '' ?>>Calle</option>
            <option value="avenida" <?= $direccion === 'avenida' ? 'selected' : '' ?>>Avenida</option>
        </select>

        <!--Con este if/elseif aparece el campo de selección de las calles o las avenidas, según la opción escogida en dirección.-->
        <?php if ($direccion === 'calle'): ?>
            <label for="via_seleccionada">Calle:</label>
            <select name="via_seleccionada" id="via_seleccionada">
                <!--Un foreach para crear las distintas opciones del campo select calle. Utilizo = para abreviar php echo-->
                <?php foreach ($calles as $calle): ?>
                    <option value="<?= $calle ?>"><?= $calle ?></option>
                <?php endforeach; ?>
            </select>
        <?php elseif ($direccion === 'avenida'): ?>
            <label for="via_seleccionada">Avenida:</label>
            <select name="via_seleccionada" id="via_seleccionada">
                <!--Un foreach para crear las distintas opciones del campo select calle. Utilizo = para abreviar php echo-->
                <?php foreach ($avenidas as $avenida): ?>
                    <option value="<?= $avenida ?>"><?= $avenida ?></option>
                <?php endforeach; ?>
            </select>
        <?php endif; ?>

        <button type="submit">Enviar</button>
    </form>
<!--Aquí el elseif que hace aparecer el segundo formulario.========================================================================================================-->
<?php elseif ($fase === 2): ?>
    <!-- Segundo formulario -->
    <!--Aquí también tenemos un campo oculto para comprobar el envío del formulario y pasar a la última fase.-->
    <form method="POST" enctype="multipart/form-data">
        <input type="hidden" name="fase" value="2">

        <label for="archivo">Subir archivo:</label>
        <input type="file" name="archivo" id="archivo" required>
        <button type="submit">Subir</button>
    </form>

<!--Último elseif para la última fase con su mensaje correspondiente.====================================================================================================-->    
<?php elseif ($fase === 3): ?>
    <p>Gracias, formulario completado y archivo subido correctamente.</p>
<?php endif; ?>

</body>
</html>
