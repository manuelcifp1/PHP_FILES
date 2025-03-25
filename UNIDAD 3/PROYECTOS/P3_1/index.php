<?php
    //3 arrays relacionados con el campo 'direccion': el primero para validar la opción seleccionada de 'direccion', los otros dos que contienen las calles y avenidas respectivamente.
    $opcionesDireccion = ['calle', 'avenida'];
    $calles = ['Real', 'Independencia', 'Recinto Sur'];
    $avenidas = ['España', 'Sanidad Pública', 'De La República'];    
    
    //Esto para saber si se ha enviado el primer formulario con éxito.
    $segundoFormularioEnviado = false;

    //Comienzo el proceso de envío con comprobación de método.
    if($_SERVER('REQUEST_METHOD') === $_POST) {

        //Segundo filtro: validación de campos vacíos. 
        if(!empty($_POST['nombre']) && !empty($_POST['apellidos']) && !empty($_POST['direccion'])) {

            //Se ha enviado bien.
            $segundoFormularioEnviado = true;
            //Creo variables de los envíos y hago validaciones de los campos de texto.
            $nombre = htmlspecialchars($_POST['nombre']);
            $apellidos = htmlspecialchars($_POST['apellidos']);
            $direccion = $_POST['direccion'];

            //Ahora, creo un formulario dinámicamente dependiendo de si se eligió calle o avenida. Cada formulario extrae los values del array correspondiente.
            if ($direccion === 'calle') {
                echo "<form method='POST'>
                        <label for='calle'>Elige una calle:</label>
                        <select name='calle' id='calle'>
                            <option value= $calles[0] >Real</option>
                            <option value= $calles[1] >Mayor</option>
                            <option value= $calles[2] >Sol</option>
                        </select>
                        <button type='submit'>ENVIAR</button>
                    </form>";
                    
            } elseif ($direccion === 'avenida') {
                echo "<form method='POST'>
                        <label for='avenida'>Elige una avenida:</label>
                        <select name='avenida' id='avenida'>
                            <option value= $avenidas[0] >España</option>
                            <option value= $avenidas[1] >Sanidad Pública</option>
                            <option value= $avenidas[2] >De La República</option>
                        </select>
                        <button type='submit'>ENVIAR</button>
                    </form>";
            }                
        }            
    }
        
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyecto P3-1</title>
</head>
<body>

<!--Esto para la lógica de cada formulario-->    
<?php if (!$mostrarSegundoFormulario): ?>
<!--Creo el primer formulario con los datos pertinentes. El campo direccion es un desplegable con dos opciones: calle o avenida.-->
    <form action="#" method="post">
        <label for="nombre">Nombre:</label><!--Con lo que hay aquí abajo hago que el value permanezca en el campo.-->
        <input type="text" name="nombre" <?php if(!empty ($_REQUEST['nombre'])):?> value="<?php echo $_REQUEST['nombre'];?>" <?php endif;?> id="nombre" required>

        <?php
        
            //Variable para almacenar errores (array).
            $errores = [];
            
            //Validación de 'nombre' con RegEx, que incluye a los nombres compuestos (Ej: Jose María).
            $validarNombre = preg_match("/^[A-Za-zÁÉÍÓÚáéíóúÑñÜü'´ ]+$/", $nombre);
            //Si falla la validación, almacenamos un mensaje de error en el array correspondiente y mostramos el mensaje.
            if(!$validarNombre) {
                $errores['nombre'] = "<p>El nombre no tiene un formato correcto.</p>";
                echo $errores['nombre'];
            }
        ?>

        <label for="apellidos">Apellidos:</label>
        <input type="text" name="apellidos" <?php if(!empty ($_REQUEST['apellidos'])):?> value="<?php echo $_REQUEST['apellidos'];?>" <?php endif;?> id="apellidos" required>
        <?php
            //Validación de 'apellidos' con RegEx. Es la misma RegEx que para 'nombre', ya que los apellidos son 2 o más palabras, así que incluye el espacio como carácter válido.
            $validarApellidos = preg_match("/^[A-Za-zÁÉÍÓÚáéíóúÑñÜü'´ ]+$/", $apellidos);
            //Si falla la validación, almacenamos un mensaje de error en el array correspondiente y mostramos el mensaje.
            if(!$validarApellidos) {
                $errores['apellidos'] = "<p>Los apellidos no tiene un formato correcto.</p>";
                echo $errores['apellidos'];
            }
        ?>

        <label for="direccion">Dirección:</label>
        <select name="direccion" id="direccion">
            <option value="calle">Calle</option>
            <option value="avenida">Avenida</option>
        </select>
        <?php
            //Compruebo que la selección hecha en 'direccion' está en el array opcionesDirección (porque podría alterarse maliciosamente).
            if(!in_array($_POST['direccion'], $opcionesDireccion)) {
                $errores['direccion'] = "<p>Ha alterado usted las opciones de este formulario. Hemos rastreado su IP y nos hemos puesto en contacto con la policía.</p>";
                    echo $errores['direccion'];
            }
        ?>        
    </form>
    <?php else: ?>
    <!--Segundo formulario-->    
    <form action="#" method="post" enctype="multipart/form-data">
        <label for="archivo">Subir archivo:</label>
        <input type="file" name="archivo" id="archivo">
        <button type="submit">Subir</button>
    </form>        
    <?php endif; ?>
    <?php
    //Inicializamos estas variables para evitar errores.
    $archivo = null;
    $destino = null;

    //Enviamos el archivo.
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['archivo'])) {

            /*Asignamos todos los datos del archivo a la variable $archivo:
            🔹 $_FILES['archivo'] contiene:
                    name → Nombre original
                    type → Tipo MIME (image/png, text/plain, etc.)
                    tmp_name → Ubicación temporal
                    error → Código de error
                    size → Tamaño en bytes*/
            $archivo = $_FILES['archivo'];

            //Validamos error en la subida
            if($archivo['error'] !== UPLOAD_ERR_OK) {
                die("Error al subir el archivo.<br>");
            }
            
            //Definimos las variables de las extensiones permitidas, el tamaño máximo y ponemos en minúsculas la extensión del archivo.
            $extensiones_permitidas = ['jpg', 'png'];
            $tamaño_maximo = 2 * 1024 * 1024;//2MB
            $ext = strtolower(pathinfo($archivo['name'], PATHINFO_EXTENSION));

            //Validar extensiones permitidas.
            if(!in_array($ext, $extensiones_permitidas)) {
                die("Extensión no permitida<br>");
            }

            //Validar tamaño máximo permitido
            if($archivo['size'] > $tamaño_maximo) {
                die("Tamaño demasiado grande, límite: " . ($tamaño_maximo / 1024 / 1024) . "MB<br>");
            }

            /*Definir carpeta de destino (usamos basename aunque $archivo['name'] sea sólo el nombre del archivo sin ruta
            por seguridad, para evitar la inyección de una ruta maliciosa.)*/
            $destino = 'C:\xampp\htdocs\MIS ARCHIVOS\PHP_FILES\PHP_FILES\UNIDAD 3\PROYECTOS\P3_1\DNI\\' . basename($archivo['name']);

            //Comprobar si el archivo existe en la carpeta de destino.
            if (file_exists($destino)) {
                die("Error: el archivo ya existe en la carpeta de destino.<br>");
            }
            }

            //Mover el archivo a carpeta de destino, verificando antes que existe ese archivo.
            if ($archivo && isset($archivo['tmp_name']) && is_uploaded_file($archivo['tmp_name'])) {
                if (move_uploaded_file($archivo['tmp_name'], $destino)) {
                    echo "Archivo subido correctamente a: " . $destino;
                } else {
                    echo "Error al mover el archivo.";
                }
            } else {
                echo "No se ha subido ningún archivo.";            
        } 
    ?>    


        
</body>
</html>