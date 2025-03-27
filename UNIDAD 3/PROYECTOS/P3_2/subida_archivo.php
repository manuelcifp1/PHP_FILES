<?php
session_start();
$usuario = $_SESSION['usuario'] ?? null;
if (!$usuario) {
    header("Location: login.php");
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
        <h2>¡Bienvenido <?= $usuario ?>!</h2>

        <label for="archivo">Sube tu documento en formato docx o txt</label>
        <input type="file" name="archivo" id="archivo">
        <button type="submit">SUBIR ARCHIVO</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_FILES['archivo'])) {
            $archivo = $_FILES['archivo'];
            if ($archivo['error'] === UPLOAD_ERR_OK) {
                $ext = strtolower(pathinfo($archivo['name'], PATHINFO_EXTENSION));
                $permitidas = ['docx', 'txt'];
                $tamanio = 2 * 1024 * 1024;
                if (in_array($ext, $permitidas) && $archivo['size'] <= $tamanio) {
                    $destino = __DIR__ . '/archivos/' . basename($archivo['name']);
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
    }
    ?>
</body>
</html>
