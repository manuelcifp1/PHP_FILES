<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<!--Debes crear una página web que permita a los usuarios subir imágenes.
Las imágenes subidas deben almacenarse en una carpeta llamada uploads.
El sistema debe validar lo siguiente:
● Solo se permitirán archivos con extensiones: .jpg, .jpeg, .png, y .gif.
● El tamaño máximo del archivo debe ser de 2 MB.
● Si el archivo ya existe en la carpeta de destino, debe mostrar un mensaje indicando que el archivo
ya está presente.
● Si se sube correctamente, debe mostrar un mensaje de éxito junto con el nombre del archivo
subido.
● En caso de error (tipo de archivo no permitido, tamaño excedido, etc.), debe mostrar un mensaje
de error correspondiente.-->
<body>
    <form action="#" method="post" enctype="multipart/form-data">
        <label for="archivo">Subir archivo:</label>
        <input type="file" name="archivo">
        <button type="submit">Subir</button>
    </form>
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
            $extensiones_permitidas = ['jpg', 'jpeg', 'png', 'gif'];
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
            $destino = 'C:\xampp\htdocs\MIS ARCHIVOS\PHP_FILES\PHP_FILES\UNIDAD 3\uploads\\' . basename($archivo['name']);

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