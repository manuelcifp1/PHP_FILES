<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subida archivo</title>
</head>
<body>
    <form action="#" method="post" enctype="multipart/form-data">

    <h2>¡Bienvenido <?= $usuario ?>!</h2>

        <label for="archivo">Sube tu documento en formato docx o txt</label>
        <input type="file" name="archivo" id="archivo">
        <button type="submit">SUBIR ARCHIVO</button>
    </form>
<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //Comprobación de archivo.
    if (isset($_FILES['archivo'])) {
        $archivo = $_FILES['archivo'];
        //Comprobación de ausencia de errores, estableciendo los parámetros que limitan el tamaño y la extensión.
        if ($archivo['error'] === UPLOAD_ERR_OK) {
            $ext = strtolower(pathinfo($archivo['name'], PATHINFO_EXTENSION));
            $permitidas = ['docx', 'txt'];
            $tamanio = 2 * 1024 * 1024;
            //Si la extensión del archivo y su tamaño son correctos, se permite la subida.
            if (in_array($ext, $permitidas) && $archivo['size'] <= $tamanio) {

                /*Esto es muy bueno: Aquí establezco la ruta usando la constante __DIR__ , que es una forma abreviada de representar el directorio actual
                 en el que está el archivo index.php. Luego se añade el nombre de la carpeta en cuestión y todo arreglado. También uso la validación basename,
                 que elimina cualquier posible ruta maliciosa añadida por un usuario con malas intenciones.*/
                $destino = __DIR__ . '/archivos/' . basename($archivo['name']);

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
    
</body>
</html>