<?php
$usuario = htmlspecialchars($_POST['usuario'] ?? '');

/*IMPORTANTE: Aquí añado una buena medidad seguridad inspirada en lo que hablamos hoy en clase sobre las sesiones.
Con esto se evita que alguien pueda entrar directamente a esta página sin pasar por el login. */
if (empty($usuario)) {
    echo "<p>Acceso no permitido. Debes iniciar sesión primero.</p>";
    echo '<a href="login.php"><button>Volver al login</button></a>';
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subida archivo</title>
</head>
<body>
    <form action="subida_archivo.php" method="post" enctype="multipart/form-data">
        <!--Aquí añado el nombre del usuario al h2.-->
        <h2>¡Bienvenido <?= $usuario ?>!</h2>

        <input type="hidden" name="usuario" value="<?= $usuario ?>">

        <label for="archivo">Sube tu documento en formato docx o txt</label>
        <input type="file" name="archivo" id="archivo">
        <button type="submit">SUBIR ARCHIVO</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['archivo'])) {
        //Lógica de la subida de archivos.
        $archivo = $_FILES['archivo'];
        if ($archivo['error'] === UPLOAD_ERR_OK) {
            $ext = strtolower(pathinfo($archivo['name'], PATHINFO_EXTENSION));
            $permitidas = ['docx', 'txt'];//Control de extensiones.
            $tamanio = 2 * 1024 * 1024;//Control de tamaño.
            //Validación de lo anterior.
            if (in_array($ext, $permitidas) && $archivo['size'] <= $tamanio) {
                //Asignación del destino del archivo.
                $destino = __DIR__ . '/archivos/' . basename($archivo['name']);
                //Comprobación de que el archivo ha sido subido anteriormente.
                if (!file_exists($destino)) {
                    move_uploaded_file($archivo['tmp_name'], $destino);
                    echo "<p>Archivo subido correctamente.</p>";
                } else {
                    echo "<p>El archivo ya existe.</p>";
                }
            } else {
                echo "<p>Archivo no válido. Solo se aceptan docx o txt y máximo 2MB.</p>";
            }
        } else {
            echo "<p>Error al subir el archivo.</p>";
        }
    }
    ?>
</body>
</html>
